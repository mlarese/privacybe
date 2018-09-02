<?php

namespace App\Action;

use App\Entity\Config\Owner;
use App\Entity\Config\User;
use App\Entity\Config\UserLogin;
use App\Entity\Privacy\Operator;
use App\Entity\Privacy\Privacy;
use App\Resource\OperatorResource;
use DateTime;
use Doctrine\ORM\EntityManager;
use Firebase\JWT\JWT;
use function md5;
use function session_commit;
use Slim\Http\Request;
use Slim\Http\Response;
use function strtolower;
use Tuupola\Base62;

class Auth extends AbstractAction {
    /**
     * @param       $request Request
     * @param       $user
     * @param array $scope
     *
     * @return mixed
     */
    private function defineJwtToken ($request, $user, $scope = ["read", "write", "delete"]) {
        $requested_scopes = $request->getParsedBody() ?: [];

        $settings = $this->getContainer()->get('settings');
        $auth = $settings->get('auth');

        $now = new DateTime();
        $future = new DateTime("+240 minutes");
        $server = $request->getServerParams();
        $jti = (new Base62())->encode(random_bytes(16));
        $payload = [
            "iat" => $now->getTimeStamp(),
            "exp" => $future->getTimeStamp(),
            "jti" => $jti,
            "scope" => $scope,
            "user" => $user,
            "sub" => $user['user']
        ];
        $secret = $auth['secret'];
        $token = JWT::encode($payload, $secret, "HS256");

        $data["token"] = $token;
        $data["expires"] = $future->getTimeStamp();

        return $data;
    }

    /**
     * @param $user
     * @param $pwd
     * @return User
     * @throws UserNotAuthorizedException
     */
    private function userHasAuth ($user, $pwd) {
        /**
         * @var User $userEntity
         */

        $userEntity = $this ->getEmConfig()
            ->getRepository(User::class)
            ->findOneBy(['user' => $user]);

        $valid = false;

        $msg='';
        if(isset($userEntity)) {
            $msg = 'User found';
            if($userEntity->getActive() && !$userEntity->getDeleted()) {
                $cfp = md5($pwd);
                $cfp = strtolower($cfp);

                $userPwd =  strtolower($userEntity->getPassword());

                if ($userPwd === $cfp) {
                    $valid = true;
                }
            } else{
                $msg = 'User found but not active or deleted';
            }

        }

        if ($valid) {
            return $userEntity;

        }
        throw new UserNotAuthorizedException('User Not Authorized Exception ' . $msg);

    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     *
     * @return mixed
     */
    public function login($request, $response, $args) {
        session_commit();
        $found = false;
        $user = $request->getParam('username');
        $password = $request->getParam('password');


        // echo 'here' ; die;
        /** @var User $ue */
        $ue = null;
        /** @var Operator $op */
        $op = null;
        try {
            $ue = $this->userHasAuth($user, $password);
            $found = true ;

            $opRes = new OperatorResource($this->getEmPrivacy( $ue->getOwnerId() ));

            $op = $opRes->findOperator($ue->getId());

        } catch (UserNotAuthorizedException $e) {
            echo $e->getMessage();
            return $response->withStatus(401, 'User not authorized ' );
        }catch (Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(401, 'Authentication error ' );
        }
        $gdprRole =  $op->getRole();
        $settings = $this->getContainer()->get('settings');
        $host = $settings["doctrine_config"]['connection']['host'];
        if($found) {
            $userSpec = [
                "acl" => $this->getAcl($gdprRole),
                "email"=> $op->getEmail(),
                "gdprRole" => $gdprRole,
                "userId" => $ue->getId(),
                "user" => $user,
                "userName" => $ue->getName(),
                "role" => $ue->getType(),
                "ownerId" => $ue->getOwnerId(),
                "source" => ($host==='127.0.0.1' )?'local': 'remote'
            ];
            $data = $this->defineJwtToken($request, $userSpec);


            $log = new UserLogin();
            $log->setIpAddress( $this->getIp() )
                ->setLoginDate(new DateTime())
                ->setUserId($ue->getId());

            $this->getEmConfig()->persist($log);
            $this->getEmConfig()->flush();

            return $response->withStatus(201)
                ->withHeader("Content-Type", "application/json")
                ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));

        }
    }

    private function getAcl($gdprRole) {

        return [
          "see-no-agreement" => ($gdprRole !== 'incharge')
        ];
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     */
    public function logout($request, $response, $args) {
        session_commit();
        return $response->withJson( array("logout"=>"ok"));
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     */
    public function user($request, $response, $args) {
        session_commit();
        $token = $request->getAttribute("token");
        $ud = $this->getUserData($request);

        return $response->withJson( ["user" => $token['user'] ] );
    }
    private function resetPassword($request, $response, $args) {
        session_commit();
        $found = false;
        $user = $request->getParam('username');
        $password = $request->getParam('password');


        // echo 'here' ; die;
        /** @var User $ue */
        $ue = null;
        /** @var Operator $op */
        $op = null;
        try {
            $ue = $this->userHasAuth($user, $password);
            $found = true ;

            $opRes = new OperatorResource($this->getEmPrivacy( $ue->getOwnerId() ));

            $op = $opRes->findOperator($ue->getId());

        } catch (UserNotAuthorizedException $e) {
            echo $e->getMessage();
            return $response->withStatus(401, 'User not authorized ' );
        }catch (Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(401, 'Authentication error ' );
        }
        $gdprRole =  $op->getRole();
        $settings = $this->getContainer()->get('settings');
        $host = $settings["doctrine_config"]['connection']['host'];
        if($found) {
            $userSpec = [
                "acl" => $this->getAcl($gdprRole),
                "email"=> $op->getEmail(),
                "gdprRole" => $gdprRole,
                "userId" => $ue->getId(),
                "user" => $user,
                "userName" => $ue->getName(),
                "role" => $ue->getType(),
                "ownerId" => $ue->getOwnerId(),
                "source" => ($host==='127.0.0.1' )?'local': 'remote'
            ];
            $data = $this->defineJwtToken($request, $userSpec);


            $log = new UserLogin();
            $log->setIpAddress( $this->getIp() )
                ->setLoginDate(new DateTime())
                ->setUserId($ue->getId());

            $this->getEmConfig()->persist($log);
            $this->getEmConfig()->flush();

            return $response->withStatus(201)
                ->withHeader("Content-Type", "application/json")
                ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));

        }
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     */
}

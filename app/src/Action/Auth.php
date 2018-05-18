<?php

namespace App\Action;

use App\Entity\Config\Owner;
use App\Entity\Config\User;
use App\Entity\Privacy\Privacy;
use DateTime;
use Doctrine\ORM\EntityManager;
use Firebase\JWT\JWT;
use function md5;
use Slim\Http\Request;use Slim\Http\Response;
use Tuupola\Base62;

class Auth extends AbstractAction {
    /**
     * @param $request Request
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



        if(isset($userEntity)) {
            if($userEntity->getActive() && !$userEntity->getDeleted()) {
                $cfp = md5($pwd);
                if ($userEntity->getPassword() === $cfp) {
                    $valid = true;
                }
            }

        }

        if ($valid) {
            return $userEntity;
        }
        throw new UserNotAuthorizedException('User Not Authorized Exception');

    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     *
     * @return mixed
     */
    public function login($request, $response, $args) {

        $found = false;
        $user = $request->getParam('username');
        $password = $request->getParam('password');

        /**
         * @var User $ue
         */
        $ue = null;

        try {

            $ue = $this->userHasAuth($user, $password);
            $found = true ;
        } catch (UserNotAuthorizedException $e) {
            return $response->withStatus(401, 'User not authorized');
        }

        $settings = $this->getContainer()->get('settings');
        $host = $settings["doctrine_config"]['connection']['host'];
        if($found) {
            $userSpec = [
                "user" => $user,
                "userName" => $ue->getName(),
                "role" => $ue->getType(),
                "ownerId" => $ue->getOwnerId(),
                "source" => ($host==='127.0.0.1' )?'local': 'remote'
            ];
            $data = $this->defineJwtToken($request, $userSpec);
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
    public function logout($request, $response, $args) {
        return $response->withJson( array("logout"=>"ok"));
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     */
    public function user($request, $response, $args) {
        $token = $request->getAttribute("token");
        $ud = $this->getUserData($request);

        return $response->withJson( ["user" => $token['user'] ] );
    }
}

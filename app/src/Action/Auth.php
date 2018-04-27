<?php

namespace App\Action;

use DateTime;
use Firebase\JWT\JWT;
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
     * @param $request Request
     * @param $response Response
     * @param $args
     */
    public function login($request, $response, $args) {
        $found = true;
        $user = $request->getParam('user');

        if($found) {
            $userSpec = ["user" => $user, "userName" => "Mauro Larese Moro", "role" => "owners"];
            $data = $this->defineJwtToken($request, $userSpec);
            return $response->withStatus(201)
                ->withHeader("Content-Type", "application/json")
                ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));

        } else {
            return $response->withStatus(401, 'User not found,');
        }
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     */
    public function logout($request, $response, $args) {
        return $response->withJson( array("logout"=>"ok"));
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     */
    public function user($request, $response, $args) {
        $token = $request->getAttribute("token");
        return $response->withJson( ["user" => $token['user'] ] );
    }
}
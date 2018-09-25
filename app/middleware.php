<?php
use RKA\SessionMiddleware;
use Slim\App;
use Slim\Collection;
use Tuupola\Middleware\CorsMiddleware;
use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;

/**
 * @var Collection $settings
 */
$settings = $app->getContainer()->get('settings');

/** @var App $app */
$app->add( new \App\Manager\ApplicationMiddleware($settings['applications'],$app));
// $app->add(new \Adbar\SessionMiddleware($settings['session']));

$app->add(new CorsMiddleware(
    [
        "origin" => ["*"],
        "methods" => ["GET", "POST", "PUT", "PATCH", "DELETE", "OPTIONS"],
        "headers.allow" => [
            "Ref",
            "Language",
            "TermId",
            "Content-Type",
            "Authorization",
            "If-Match",
            "If-Unmodified-Since",
            "Token",
            "OwnerId",
            "Domain",
            "Page"
        ],
        "headers.expose" => ["Etag"],
        "credentials" => true,
        "cache" => 86400,
        "error" => function ($request, $response, $arguments) {
            $data["status"] = "error";
            $data["message"] = $arguments["message"];
            return $response
                ->withHeader("Content-Type", "application/json")
                ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
        }
    ]
));

// jwt, oauth
$authMode = 'jwt';


$auth = $settings->get('auth');

if($authMode === 'jwt') {
    $app->add(new Tuupola\Middleware\JwtAuthentication([
        "path" => ["/api", "/api/auth"],
        "ignore" => [
            "/api/widgetreq",
            "/api/widgetcomp",
            "/api/widget",
            "/api/auth/login",
            "/api/auth/pwdres",
            "/api/test",
            "/api/surfer",
            "/api/import/dataone/upgrade",
            "/api/import/mailone/newsletter",
            "/api/import/abs/structure/reservation",
            "/api/import/abs/portal/reservation",
            "/api/import/abs/enquiry",
            "/api/import/abs/storeone",
            "/api/import/advancedimporter/preset",
            "/api/import/advancedimporter/import",
        ],
        "secret" => $auth['secret'],
        "secure" => false,
        "attribute" => "token",
        // "relaxed" => ["localhost"],
        "error" => function ($response, $arguments) {
            $data["status"] = "error";
            $data["message"] = $arguments["message"];
            return $response
                ->withHeader("Content-Type", "application/json")
                ->getBody()->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
        }
    ]));

} else if($authMode === 'oauth') {
    // not implemented yet
}

<?php
use RKA\SessionMiddleware;
use Slim\App;
use Slim\Collection;
use Tuupola\Middleware\CorsMiddleware;
use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;

/**
 * @var App $app
 */
$app->add(new SessionMiddleware(['name' => 'base_session']));

$app->add(new CorsMiddleware(
    [
        "origin" => ["*"],
        "methods" => ["GET", "POST", "PUT", "PATCH", "DELETE", "OPTIONS"],
        "headers.allow" => [
            "Content-Type",
            "Authorization",
            "If-Match",
            "If-Unmodified-Since",
            "Token",
            "OwnerId",
            "Language",
            "TermId"
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

/**
 * @var Collection $settings
 */
$settings = $app->getContainer()->get('settings');
$auth = $settings->get('auth');

if($authMode === 'jwt') {
    $app->add(new Tuupola\Middleware\JwtAuthentication([
        "path" => ["/api", "/api/auth"],
        "ignore" => ["/api/widget", "/api/auth"],
        "secret" => $auth['secret'],
        "secure" => false,
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
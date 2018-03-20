<?php
use RKA\SessionMiddleware;
use Tuupola\Middleware\CorsMiddleware;

$app->add(new SessionMiddleware(['name' => 'base_session']));

$app->add(new CorsMiddleware(
    [
        "origin" => ["*"],
        "methods" => ["GET", "POST", "PUT", "PATCH", "DELETE"],
        "headers.allow" => ["Authorization", "If-Match", "If-Unmodified-Since"],
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
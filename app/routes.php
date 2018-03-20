<?php
// Routes


use App\Action\HomeAction;

$app->get('/test', function() {
    $session = new \RKA\Session();
    $bar = $session->bar;
    $session->foo = 'this';
    \RKA\Session::destroy();

    echo json_encode(["result"=>"OK"]);

});

$app->get('/', 'App\Action\HomeAction:dispatch');
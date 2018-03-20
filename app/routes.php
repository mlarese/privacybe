<?php
// Routes


use App\Action\HomeAction;

$app->get('/test', function() {
    $session = new \RKA\Session();
    $bar = $session->bar;
    //$session->foo = 'this';
    //\RKA\Session::destroy();

    echo json_encode(["result"=>"OK", "session"=>$session->foo]);

});

$app->get('/', 'App\Action\HomeAction:dispatch');
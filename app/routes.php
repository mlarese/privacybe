<?php
// Routes


use App\Action\Home;

$app->get('/test', function() {
    $session = new \RKA\Session();
    $bar = $session->bar;
    //$session->foo = 'this';
    //\RKA\Session::destroy();

    echo json_encode(["result"=>"OK", "session"=>$session->foo]);

});

$app->get('/widget', 'App\Action\Privacy:getWidgetTerm');

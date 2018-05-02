<?php
// Routes

$app->get('/api/test/welcome', 'App\Action\Test:welcome');

// widget
$app->get('/api/widget', 'App\Action\PrivacyManager:getWidgetTerm');

// terms
$app->get('/api/owner/term', 'App\Action\Terms:getAllTerms');
$app->get('/api/owner/term/{id}', 'App\Action\Terms:getTerm');


// treatments
$app->get('/api/owner/treatment', 'App\Action\Treatments:getAllTreatments');
$app->get('/api/owner/treatment/{code}', 'App\Action\Treatments:getTreatment');


// owners operators (delegates)
$app->get('/api/owner/operator', 'App\Action\Delegates:getAllDelegates');
$app->get('/api/owner/operator/{id}', 'App\Action\Delegates:getDelegate');


// auth
$app->post('/api/auth/login', 'App\Action\Auth:login');
$app->post('/api/auth/logout', 'App\Action\Auth:logout');
$app->get('/api/auth/user', 'App\Action\Auth:user');

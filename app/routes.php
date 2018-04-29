<?php
// Routes

$app->get('/api/test/welcome', 'App\Action\Test:welcome');

// widget
$app->get('/api/widget', 'App\Action\PrivacyManager:getWidgetTerm');

// terms
$app->get('/api/owner/term', 'App\Action\Terms:getAllTerms');
$app->get('/api/owner/term/{id}', 'App\Action\Terms:getTerm');


// auth
$app->post('/api/auth/login', 'App\Action\Auth:login');
$app->post('/api/auth/logout', 'App\Action\Auth:logout');
$app->get('/api/auth/user', 'App\Action\Auth:user');

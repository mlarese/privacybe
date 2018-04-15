<?php
// Routes

// widget
$app->get('/api/widget', 'App\Action\Privacy:getWidgetTerm');

// terms
$app->get('/api/term', 'App\Action\Terms:getAllTerms');


// auth
$app->post('/api/auth/login', 'App\Action\Auth:login');
$app->post('/api/auth/logout', 'App\Action\Auth:logout');
$app->get('/api/auth/user', 'App\Action\Auth:user');
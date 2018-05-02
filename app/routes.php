<?php
// Routes

$app->get('/api/test/welcome', 'App\Action\Test:welcome');

// widget
$app->get('/api/widget', 'App\Action\PrivacyManager:getWidgetTerm');

// terms
$app->get('/api/owner/term', 'App\Action\Terms:getAllTerms');
$app->get('/api/owner/term/[id]', 'App\Action\Terms:getTerm');


// auth
$app->post('/api/auth/login', 'App\Action\Auth:login');
$app->post('/api/auth/logout', 'App\Action\Auth:logout');
$app->get('/api/auth/user', 'App\Action\Auth:user');


//upgrade privacy disclaimere phase < 25th May

$app->get('/upgrade/allow/{domainid}/{pathid}/{email}', 'App\Action\Subscribers:allow');

$app->get('/upgrade/disallow/{domainid}/{pathid}/{email}', 'App\Action\Subscribers:disallow');

$app->get('/upgrade/list/{domainid}/{pathid}/', 'App\Action\Subscribers:list');

$app->get('/upgrade/domain', 'App\Action\Subscribers:domainList');

$app->post('/upgrade/allow/{domainid}/{pathid}/{email}', 'App\Action\Subscribers:create');
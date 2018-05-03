<?php
// Routes

$app->get('/api/test/welcome', 'App\Action\Test:welcome');

// widget
$app->get('/api/widget', 'App\Action\PrivacyManager:getWidgetTerm');
$app->post('/api/widget', 'App\Action\PrivacyManager:savePrivacy');

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


//upgrade privacy disclaimere phase < 25th May

$app->get('/upgrade/allow/{domainid}/{pathid}/{email}', 'App\Action\Subscribers:allow');

$app->get('/upgrade/disallow/{domainid}/{pathid}/{email}', 'App\Action\Subscribers:disallow');

$app->get('/upgrade/list/{domainid}/{pathid}/', 'App\Action\Subscribers:list');

$app->get('/upgrade/domain', 'App\Action\Subscribers:domainList');

$app->post('/upgrade/allow/{domainid}/{pathid}/{email}', 'App\Action\Subscribers:create');

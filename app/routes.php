<?php
// Routes

$app->get('/api/test/welcome', 'App\Action\Test:welcome');
$app->get('/api/test/enc', 'App\Action\Test:testEnc');
$app->get('/api/test/encread', 'App\Action\Test:testEncRead');

// widget
$app->get('/api/widget', 'App\Action\PrivacyManager:getWidgetTerm');
$app->post('/api/widget', 'App\Action\PrivacyManager:savePrivacy');
$app->get('/api/widget/{id}', 'App\Action\PrivacyManager:getWidgetTermById');
// terms
$app->put('/api/owner/term/{id}', 'App\Action\Terms:updateTerm');
$app->post('/api/owner/term', 'App\Action\Terms:insertTerm');
$app->get('/api/owner/term', 'App\Action\Terms:getAllTerms');
$app->get('/api/owner/term/{id}', 'App\Action\Terms:getTerm');

// owners
$app->get('/api/owner/profile', 'App\Action\Owners:getOwners');
$app->get('/api/owner/profile/{id}', 'App\Action\Owners:getOwnerById');
$app->post('/api/owner/profile', 'App\Action\Owners:newOwner');
$app->put('/api/owner/profile/{id}', 'App\Action\Owners:updateOwner');

// treatments
$app->put('/api/owner/treatment/{code}', 'App\Action\Treatments:updateTreatment');
$app->post('/api/owner/treatment', 'App\Action\Treatments:newTreatment');
$app->get('/api/owner/treatment', 'App\Action\Treatments:getAllTreatments');
$app->get('/api/owner/treatment/{code}', 'App\Action\Treatments:getTreatment');


// owners operators
$app->put('/api/owner/operator/{id}', 'App\Action\Operators:updateOperator');
$app->post('/api/owner/operator', 'App\Action\Operators:newOperator');
$app->get('/api/owner/operator', 'App\Action\Operators:getAllOperators');
$app->get('/api/owner/operator/{id}', 'App\Action\Operators:getOperator');


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

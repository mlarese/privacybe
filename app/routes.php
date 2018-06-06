<?php
// Routes

$app->get('/api/test/welcome', 'App\Action\Test:welcome');
$app->get('/api/test/enc', 'App\Action\Test:testEnc');
$app->get('/api/test/encread', 'App\Action\Test:testEncRead');

//user list
$app->post('/api/owner/usersearch', 'App\Action\Users:search');
$app->get('/api/owner/usersearch/{email}', 'App\Action\Users:privacyUser');

//widget
$app->get('/api/widgetreq', 'App\Action\PrivacyManager:getWidgetRequest');
$app->get('/api/widget', 'App\Action\PrivacyManager:getWidgetTerm');
$app->post('/api/widget', 'App\Action\PrivacyManager:savePrivacy');
$app->post('/api/widgetcomp', 'App\Action\PrivacyManager:savePlainPrivacy');
$app->get('/api/widget/{id}', 'App\Action\PrivacyManager:getWidgetTermById');
// terms
$app->put('/api/owner/term/{id}', 'App\Action\Terms:updateTerm');
$app->post('/api/owner/term', 'App\Action\Terms:insertTerm');
$app->get('/api/owner/term', 'App\Action\Terms:getAllTerms');
$app->get('/api/owner/term/{id}', 'App\Action\Terms:getTerm');
$app->get('/api/owner/termfilter', 'App\Action\Terms:termsAndTreatsFW');

// owners
$app->get('/api/owner/profile', 'App\Action\Owners:getOwners');
$app->get('/api/owner/profile/{id}', 'App\Action\Owners:getOwnerById');
$app->post('/api/owner/profile', 'App\Action\Owners:newOwner');
$app->put('/api/owner/profile/{id}', 'App\Action\Owners:updateOwner');
$app->put('/api/owner/config/{id}', 'App\Action\Owners:updateOwnerProfile');

// privacy
$app->post('/api/owner/privacygrp', 'App\Action\PrivacyManager:searchPrivacyGrouped');
$app->post('/api/owner/privacyusers', 'App\Action\PrivacyManager:privacyUsers');
$app->put('/api/owner/userlastdata/{id}', 'App\Action\Users:updateMainData');
$app->post('/api/owner/userterms', 'App\Action\Users:updateTerms');


$app->get('/api/owner/privacy', 'App\Action\PrivacyManager:searchPrivacy');
$app->get('/api/owner/privacy/{id}', 'App\Action\PrivacyManager:getPrivacy');
$app->get('/api/surfer/privacy/{id}', 'App\Action\PrivacyManager:getPrivacy');
$app->delete('/api/surfer/privacybye/{email}', 'App\Action\Users:deleteUserSubscriptions');


// treatments
$app->put('/api/owner/treatment/{code}', 'App\Action\Treatments:updateTreatment');
$app->post('/api/owner/treatment', 'App\Action\Treatments:newTreatment');
$app->get('/api/owner/treatment', 'App\Action\Treatments:getAllTreatments');
$app->get('/api/owner/treatment/{code}', 'App\Action\Treatments:getTreatment');

$app->get('/api/owner/domain', 'App\Action\Owners:getDomains');

// owners operators
$app->put('/api/owner/operator/{id}', 'App\Action\Operators:updateOperator');
$app->post('/api/owner/operator', 'App\Action\Operators:newOperator');
$app->get('/api/owner/operator', 'App\Action\Operators:getAllOperators');
$app->get('/api/owner/operator/{id}', 'App\Action\Operators:getOperator');


//CustomerCare users
$app->get('/api/customercare/operator', 'App\Action\CustomerCares:getOperators');
$app->get('/api/customercare/operator/{id}', 'App\Action\CustomerCares:getOperator');
$app->post('/api/customercare/operator', 'App\Action\CustomerCares:newOperator');
$app->put('/api/customercare/operator/{id}', 'App\Action\CustomerCares:updateOperator');


$app->get('/api/customercare/user', 'App\Action\CustomerCare:getUsers');
$app->get('/api/customercare/user/{id}', 'App\Action\CustomerCare:getUser');

// auth
$app->post('/api/auth/login', 'App\Action\Auth:login');
$app->post('/api/auth/chpw', 'App\Action\Users:changePassword');
$app->post('/api/auth/logout', 'App\Action\Auth:logout');
$app->get('/api/auth/user', 'App\Action\Auth:user');


//upgrade privacy disclaimere phase < 25th May

$app->get('/upgrade/allow/{domainid}/{pathid}/{email}', 'App\Action\Subscribers:allow');

$app->get('/upgrade/disallow/{domainid}/{pathid}/{email}', 'App\Action\Subscribers:disallow');

$app->get('/upgrade/list/{domainid}/{pathid}/', 'App\Action\Subscribers:list');

$app->get('/upgrade/domain', 'App\Action\Subscribers:domainList');

$app->post('/upgrade/allow/{domainid}/{pathid}/{email}', 'App\Action\Subscribers:create');


$app->post('/api/adapters/{connector}/{adapter}/{action}', 'App\Action\ShareSubscriberList:create');

$app->get('/api/adapters/{connector}/{adapter}/{action}', 'App\Action\ShareSubscriberList:list');
//$app->post('/adapters/{connector}/{adapter}/export', 'App\Action\ShareSubscriberList:create');




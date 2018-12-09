<?php
// Routes


/*********************************************************
 *                  OWNER
 *********************************************************/

$app->get('api/bi/ownerping', 'GDPR\Action\Bi:ownerPing');
$app->get('api/bi/ownerprivacy/{id}', 'GDPR\Action\Bi:ownerPrivacy');
$app->get('api/bi/ownerprivacy', 'GDPR\Action\Bi:ownerPrivacies');
$app->post('api/bi/ownerprivacy', 'GDPR\Action\Bi:ownerPrivacyAdd');
$app->get('api/bi/ownerverifyflag/{id}', 'GDPR\Action\Bi:ownerVerifyFlag');
$app->get('api/bi/ownerprofile/{id}', 'GDPR\Action\Bi:ownerProfile');
$app->post('api/bi/ownersearch', 'GDPR\Action\Bi:ownerSearch');
$app->get('api/bi/ownersearch/{id}', 'GDPR\Action\Bi:ownerSearchCollection');

/*********************************************************
 *                  MODULE
 *********************************************************/

$app->get('/api/owner/module', 'GDPR\Action\Modules:getAllModules');
$app->get('/api/owner/module/{id}', 'GDPR\Action\Modules:getModule');
$app->put('/api/owner/module/{id}', 'GDPR\Action\Modules:updateModule');
$app->post('/api/owner/module', 'GDPR\Action\Modules:insertModule');
$app->delete('/api/owner/module/{id}', 'GDPR\Action\Modules:moduleDelete');


/*********************************************************
 *                  WIDGET
 *********************************************************/

$app->get('/api/owner/widget', 'GDPR\Action\Widgets:getAllWidget');
$app->get('/api/owner/widget/{id}', 'GDPR\Action\Widgets:getWidget');
$app->put('/api/owner/widget/{id}', 'GDPR\Action\Widgets:updateWidget');
$app->post('/api/owner/widget', 'GDPR\Action\Widgets:insertWidget');
$app->delete('/api/owner/widget/{id}', 'GDPR\Action\Widgets:widgetDelete');

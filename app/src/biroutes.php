<?php
// Routes

use App\Base\BaseRoutesManager;

$routeMngr = new BaseRoutesManager($app);

/*********************************************************
 *                  OWNER
 *********************************************************/

$app->get('api/bi/ownerping', 'App\Action\Bi:ownerPing');
$app->get('api/bi/ownerprivacy/{id}', 'App\Action\Bi:ownerPrivacy');
$app->get('api/bi/ownerprivacy', 'App\Action\Bi:ownerPrivacies');
$app->post('api/bi/ownerprivacy', 'App\Action\Bi:ownerPrivacyAdd');
$app->get('api/bi/ownerverifyflag/{id}', 'App\Action\Bi:ownerVerifyFlag');
$app->get('api/bi/ownerprofile/{id}', 'App\Action\Bi:ownerProfile');
$app->post('api/bi/ownersearch', 'App\Action\Bi:ownerSearch');
$app->get('api/bi/ownersearch/{id}', 'App\Action\Bi:ownerSearchCollection');

/*********************************************************
 *                  MODULE
 *********************************************************/

$app->get('/api/owner/module', 'App\Action\Modules:getAllModules');
$app->get('/api/owner/module/{id}', 'App\Action\Module:getModule');
$app->put('/api/owner/module/{id}', 'App\Action\Module:updateModule');
$app->post('/api/owner/module', 'App\Action\Module:insertModule');
$app->delete('/api/owner/module/{id}', 'App\Action\Module:moduleDelete');


/*********************************************************
 *                  WIDGET
 *********************************************************/

$app->get('/api/owner/widget', 'App\Action\Widget:getAllWidget');
$app->get('/api/owner/widget/{id}', 'App\Action\Widget:getWidget');
$app->put('/api/owner/widget/{id}', 'App\Action\Widget:updateWidget');
$app->post('/api/owner/widget', 'App\Action\Widget:insertWidget');
$app->delete('/api/owner/widget/{id}', 'App\Action\Widget:widgetDelete');

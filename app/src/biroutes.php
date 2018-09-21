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

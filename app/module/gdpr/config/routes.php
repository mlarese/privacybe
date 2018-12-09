<?php
// Routes

/*********************************************************
 *                  TEST
 *********************************************************/

use GDPR\Action\Attachments;
use GDPR\Action\AttachmentView;
use GDPR\Action\Configurations;
use GDPR\Action\DeferredPrivacies;
use GDPR\Action\Dictionaries;
use GDPR\Action\Operators;
use GDPR\Action\Owners;
use GDPR\Action\PrivacyManager;
use GDPR\Action\ShareSubscriberList;
use GDPR\Action\Subscriptions;
use GDPR\Action\Users;
use GDPR\Action\UsersRequests;
use GDPR\Base\BaseRoutesManager;
use GDPR\Entity\Privacy\Configuration;
use GDPR\Entity\Privacy\UserRequest;

$routeMngr = new BaseRoutesManager($app);


/******************************
 * bi
 ******************************/
$app->get('/api/bi/dimensions', 'GDPR\Action\Bi:retrieveDimensions');

$app->get('/api/test/welcome', 'GDPR\Action\Test:welcome');
$app->get('/api/test/enc', 'GDPR\Action\Test:testEnc');
$app->get('/api/test/encread', 'GDPR\Action\Test:testEncRead');
$app->get('/api/test/encdec', 'GDPR\Action\Test:testEncDec');
$app->get('/api/test/dimensions/{ownerId}', 'GDPR\Action\Bi:retrieveDimensions');

$app->post('/api/test/upload', 'GDPR\Action\Test:upload');


/** @var GDPR\Action\Emails\Emails */
$app->get('/api/test/email', 'GDPR\Action\Emails\Emails:privacyRequestTest');
$app->get('/api/test/generic', 'GDPR\Action\Emails\Emails:generic');
$app->get('/api/test/dblopt', 'GDPR\Action\Emails\Emails:doubleOptinConfirm');

/** @var GDPR\Action\DeferredPrivacies */
$app->put('/api/test/dblopFtvis', 'GDPR\Action\DeferredPrivacies:doubleOptinVisited');

/** @var PrivacyManager */
$app->post('/api/test/import', 'GDPR\Action\PrivacyManager:import');
$app->post('/api/test/usersupfile/{uid}', 'GDPR\Action\PrivacyManager:uploadUserPrivacy');

/*********************************************************
 *                  UNSUB NEWSLETTERS
 *********************************************************/
/** invio email annullamento */
/**
 * @var GDPR\Action\Emails\Emails
 * @example  esempio link  /api/surfer/sendunsubemail?_k=urlenc(base64(email=&owner=)) & l=language
 */

$app->get('/api/surfer/sendunsubemail', 'GDPR\Action\Emails\Emails:unsubscribeEmail');

/**
 * @var Subscriptions
 * @example  esempio link  /api/surfer/unsubnews?_k=email=&owner=
 */
$app->get('/api/surfer/unsubnews', 'GDPR\Action\Subscriptions:unsubscribeNewsletters');

/*********************************************************
 *                  Attachments
 *********************************************************/
/** @var PrivacyManager */
$app->get('/api/user/attachmentdwn/{uid}/{fname}', 'GDPR\Action\PrivacyManager:downloadAttachment');
// $app->get('/api/user/attachmentdwn/{uid}/{fname}', 'GDPR\Action\AttachmentView:getById');


$app->post('/api/user/attachmentupd/{uid}', 'GDPR\Action\PrivacyManager:uploadUserPrivacy');
$routeMngr->baseRoutes("/api/user/attachment", Attachments::class);

$routeMngr->baseRoutes("/api/user/view/{uid}/{fname}", AttachmentView::class);

/*********************************************************
 *                  Config
 *********************************************************/
$routeMngr->baseRoutes("/api/owner/configuration", Configurations::class,'code');

/*********************************************************
 *                  Owner dictionary
 *********************************************************/
$routeMngr->baseRoutes("/api/owner/dictionary", Dictionaries::class,'code');

/*********************************************************
 *                  WIDGET
 *********************************************************/
/** @var PrivacyManager */
$app->get('/api/widgetreq', 'GDPR\Action\PrivacyManager:getWidgetRequest');
$app->get('/api/widget', 'GDPR\Action\PrivacyManager:getWidgetTerm');
$app->post('/api/widget', 'GDPR\Action\PrivacyManager:savePrivacy');
/** @var PrivacyManager */
$app->post('/api/widgetcomp', 'GDPR\Action\PrivacyManager:savePlainPrivacy');
$app->get('/api/widget/{id}', 'GDPR\Action\PrivacyManager:getWidgetTermById');
/** @var UsersRequests */
$app->post('/api/surfer/unsubnewsrequest', 'GDPR\Action\UsersRequests:insertUnsubscribeNewsRequest');
$app->post('/api/surfer/unsuballrequest', 'GDPR\Action\UsersRequests:insertUnsubscribeAllRequest');
$app->post('/api/widget/userrequest', 'GDPR\Action\UsersRequests:insertSubscriptionRequest');
$app->get('/api/surfer/userrequest', 'GDPR\Action\UsersRequests:insertSubscriptionRequestFromLink');

/*********************************************************
 *                  TERM
 *********************************************************/
$app->put('/api/owner/term/{id}', 'GDPR\Action\Terms:updateTerm');
$app->post('/api/owner/term', 'GDPR\Action\Terms:insertTerm');
$app->get('/api/owner/term', 'GDPR\Action\Terms:getAllTerms');
$app->get('/api/owner/term/{id}', 'GDPR\Action\Terms:getTerm');
$app->get('/api/owner/termfilter', 'GDPR\Action\Terms:termsAndTreatsFW');
$app->post('/api/owner/termcopy', 'GDPR\Action\Terms:termCopy');
$app->delete('/api/owner/term/{id}', 'GDPR\Action\Terms:termDelete');

/*********************************************************
 *                  DOMAIN
 *********************************************************/
/** @var Owners */
    $app->get('/api/domain/loadall', 'GDPR\Action\Owners:loadAllDomains');


/*********************************************************
 *                  TERMS PAGES
 *********************************************************/
$app->get('/api/owner/termspages', 'GDPR\Action\TermPages:getTermsPages');
$app->get('/api/owner/termspages/{termId}', 'GDPR\Action\TermPages:getTermPages');

/*********************************************************
 *                  OWNERS
 *********************************************************/
/** @var Owners */
$app->get('/api/owner/profile', 'GDPR\Action\Owners:getOwners');
$app->get('/api/owner/profile/{id}', 'GDPR\Action\Owners:getOwnerById');
$app->post('/api/owner/profile', 'GDPR\Action\Owners:newOwner');
$app->put('/api/owner/profile/{id}', 'GDPR\Action\Owners:updateOwner');
$app->put('/api/owner/config/{id}', 'GDPR\Action\Owners:updateOwnerProfile');

/*********************************************************
 *                  PRIVACY GROUPED
 *********************************************************/
/**  @var GDPR\Action\PrivacyManager */
$app->post('/api/owner/privacygrp', 'GDPR\Action\PrivacyManager:searchPrivacyGrouped');
$app->post('/api/owner/privacyusers', 'GDPR\Action\PrivacyManager:privacyUsers');
/**  @var GDPR\Action\Users */
$app->put('/api/owner/userlastdata/{id}', 'GDPR\Action\Users:updateMainData');
$app->post('/api/owner/userterms', 'GDPR\Action\Users:updateTerms');

/*********************************************************
 *                  PRIVACY OWNER AND SURFER
 *********************************************************/
/**  @var GDPR\Action\PrivacyManager */
$app->get('/api/owner/privacy', 'GDPR\Action\PrivacyManager:searchPrivacy');
$app->get('/api/owner/privacy/{id}', 'GDPR\Action\PrivacyManager:getPrivacy');
$app->get('/api/surfer/privacy/{id}', 'GDPR\Action\PrivacyManager:getPrivacy');
$app->get('/api/surfer/privacybyeod', 'GDPR\Action\PrivacyManager:getPrivacyiesByEmailOwnerDomain');
$app->get('/api/surfer/privacybye', 'GDPR\Action\PrivacyManager:getPrivacyByEmail');
/**  @var GDPR\Action\Users */
$app->delete('/api/surfer/privacybye/{email}', 'GDPR\Action\Users:deleteUserSubscriptions');

/**  @var GDPR\Action\DeferredPrivacies */
$app->put('/api/surfer/dbloptvis', 'GDPR\Action\DeferredPrivacies:setVisited');

/*********************************************************
 *                  TREATMENTS
 *********************************************************/
$app->put('/api/owner/treatment/{code}', 'GDPR\Action\Treatments:updateTreatment');
$app->post('/api/owner/treatment', 'GDPR\Action\Treatments:newTreatment');
$app->get('/api/owner/treatment', 'GDPR\Action\Treatments:getAllTreatments');
$app->get('/api/owner/treatment/{code}', 'GDPR\Action\Treatments:getTreatment');

$app->get('/api/owner/domain', 'GDPR\Action\Owners:getDomains');

/*********************************************************
 *                  OWNERS OPERATORS
 *********************************************************/
/** @var Operators */
$app->put('/api/owner/operator/{id}', 'GDPR\Action\Operators:updateOperator');
$app->post('/api/owner/operator', 'GDPR\Action\Operators:newOperator');
$app->get('/api/owner/operator', 'GDPR\Action\Operators:getAllOperators');
$app->get('/api/owner/operator/{id}', 'GDPR\Action\Operators:getOperator');

/*********************************************************
 *                  OWNERS USER SEARCH
 *********************************************************/
/** @var Users */
$app->post('/api/owner/usersearch', 'GDPR\Action\Users:search');
$app->get('/api/owner/usersearch/{email}', 'GDPR\Action\Users:privacyUser');

$app->post('/api/owners/usersupfile/{uid}', 'GDPR\Action\PrivacyManager:uploadUserPrivacy');


/*********************************************************
 *                  OWNERS USERREQUESTS
 *********************************************************/
/** @var UsersRequests */
$app->get('/api/owner/userrequest', 'GDPR\Action\UsersRequests:retrieve');
$app->get('/api/owner/userrequesto', 'GDPR\Action\UsersRequests:retrieveOpen');
$app->get('/api/owner/userrequestsendm', 'GDPR\Action\Emails\Emails:sendPrivaciesAfterRequest');
$app->put('/api/owner/userrequestc/{id}', 'GDPR\Action\UsersRequests:closeRequest');

/*********************************************************
 *                  USER IMPORT
 *********************************************************/
$app->post('/api/import/users', 'GDPR\Action\PrivacyManager:import');


/*********************************************************
 *                  CUSTOMERCARE OPERATORS
 *********************************************************/
$app->get('/api/customercare/operator', 'GDPR\Action\CustomerCares:getOperators');
$app->get('/api/customercare/operator/{id}', 'GDPR\Action\CustomerCares:getOperator');
$app->post('/api/customercare/operator', 'GDPR\Action\CustomerCares:newOperator');
$app->put('/api/customercare/operator/{id}', 'GDPR\Action\CustomerCares:updateOperator');

/*********************************************************
 *                  CUSTOMERCARE USERS
 *********************************************************/
$app->get('/api/customercare/user', 'GDPR\Action\CustomerCare:getUsers');
$app->get('/api/customercare/user/{id}', 'GDPR\Action\CustomerCare:getUser');

/*********************************************************
 *                  CUSTOMERCARE OWNERS
 *********************************************************/
$app->get('/api/customercare/owner', 'GDPR\Action\CustomerCares:getOwners');

/*********************************************************
 *                  CUSTOMERCARE WIDGETS
 *********************************************************/
$app->get('/api/customercare/widget', 'GDPR\Action\CustomerCares:getWidgets');

/*********************************************************
 *                  CUSTOMERCARE DEACTIVATE
 *********************************************************/
$app->put('/api/customercare/deactivateowner/{id}', 'GDPR\Action\CustomerCares:deactivate');

/*********************************************************
 *                  CUSTOMERCARE ACTIVATE
 *********************************************************/
$app->put('/api/customercare/activateowner/{id}', 'GDPR\Action\CustomerCares:activate');

/*********************************************************
 *                  OWNER ADD USER
 *********************************************************/
//retrieve term
$app->get('/api/owner/termtosign/{language}/{termId}', 'GDPR\Action\PrivacyManager:toSuscribeTerm');
/** @var PrivacyManager */
$app->post('/api/owner/user', 'GDPR\Action\PrivacyManager:savePlainPrivacy');
/*********************************************************
 *                  AUTH
 *********************************************************/
/** @var \GDPR\Action\Auth */
$app->post('/api/auth/login', 'GDPR\Action\Auth:login');
/** @var Users */
$app->post('/api/auth/chpw', 'GDPR\Action\Users:changePassword');
$app->post('/api/auth/logout', 'GDPR\Action\Auth:logout');
$app->get('/api/auth/user', 'GDPR\Action\Auth:user');
$app->get('/api/auth/pwdres/{user}', 'GDPR\Action\Auth:resetPasswordEmail');
$app->post('/api/auth/pwdres', 'GDPR\Action\Auth:resetPassword');

//upgrade privacy disclaimere phase < 25th May

$app->get('/upgrade/allow/{domainid}/{pathid}/{email}', 'GDPR\Action\Subscribers:allow');

$app->get('/upgrade/disallow/{domainid}/{pathid}/{email}', 'GDPR\Action\Subscribers:disallow');

$app->get('/upgrade/list/{domainid}/{pathid}/', 'GDPR\Action\Subscribers:list');

$app->get('/upgrade/domain', 'GDPR\Action\Subscribers:domainList');

$app->post('/upgrade/allow/{domainid}/{pathid}/{email}', 'GDPR\Action\Subscribers:create');

/** @var ShareSubscriberList */
$app->post('/api/adapters/{connector}/{adapter}/{action}', 'GDPR\Action\ShareSubscriberList:create');

$app->get('/api/adapters/{connector}/{adapter}/{action}', 'GDPR\Action\ShareSubscriberList:list');

//$app->get('/api/adapters/{connector}/{adapter}/{action}', 'GDPR\Action\ShareSubscriberList:import');


//$app->post('/adapters/{connector}/{adapter}/export', 'GDPR\Action\ShareSubscriberList:create');

/*********************************************************
 *                        IMPORT
 *********************************************************/
$app->post(
    '/api/import/dataone/upgrade',
    'GDPR\Action\Import\DataONEUpgrade:import'
);
$app->post(
    '/api/import/mailone/newsletter',
    'GDPR\Action\Import\MailONENewsletter:import'
);
$app->post(
    '/api/import/abs/structure/reservation',
    'GDPR\Action\Import\ABSReservation:importStructure'
);
$app->post(
    '/api/import/abs/portal/reservation',
    'GDPR\Action\Import\ABSReservation:importPortal'
);
$app->post(
    '/api/import/abs/enquiry',
    'GDPR\Action\Import\ABSEnquiry:import'
);

$app->post(
    '/api/import/abs/storeone',
    'GDPR\Action\Import\StoreONE:import'
);
$app->post(
    '/api/import/advancedimporter/preset',
    'GDPR\Action\Import\AdvancedImporter:preset'
);
$app->post(
    '/api/import/advancedimporter/import',
    'GDPR\Action\Import\AdvancedImporter:import'
);

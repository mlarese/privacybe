<?php
// Routes

use GDPR\Action\Attachments;
use GDPR\Action\AttachmentsView;
use GDPR\Action\Configurations;
use GDPR\Action\Dictionaries;

return [
['method' => 'get', 'path' =>'/api/surfer/sendunsubemail', 'class' => 'GDPR\Action\Emails\Emails:unsubscribeEmail'],
['method' => 'get', 'path' =>'/api/surfer/unsubnews', 'class' => 'GDPR\Action\Subscriptions:unsubscribeNewsletters'],
['method' => 'get', 'path' =>'/api/user/attachmentdwn/{uid}/{fname}', 'class' => 'GDPR\Action\PrivacyManager:downloadAttachment'],
['method' => 'post', 'path' =>'/api/user/attachmentupd/{uid}', 'class' => 'GDPR\Action\PrivacyManager:uploadUserPrivacy'],
['method' => 'baseRoutes', 'path' =>"/api/user/attachment", 'class' => Attachments::class,'args'=> ['id']],
['method' => 'baseRoutes', 'path' =>"/api/user/view/{uid}/{fname}", 'class' => AttachmentsView::class,'args'=> ['id']],
['method' => 'baseRoutes', 'path' =>"/api/owner/configuration", 'class' => Configurations::class,'args'=> ['code'],
['method' => 'baseRoutes', 'path' =>"/api/owner/dictionary", 'class' => Dictionaries::class,'args'=> ['code']]],
['method' => 'get', 'path' =>'/api/widgetreq', 'class' => 'GDPR\Action\PrivacyManager:getWidgetRequest'],
['method' => 'get', 'path' =>'/api/widget', 'class' => 'GDPR\Action\PrivacyManager:getWidgetTerm'],
['method' => 'post', 'path' =>'/api/widget', 'class' => 'GDPR\Action\PrivacyManager:savePrivacy'],
['method' => 'post', 'path' =>'/api/widgetcomp', 'class' => 'GDPR\Action\PrivacyManager:savePlainPrivacy'],
['method' => 'get', 'path' =>'/api/widget/{id}', 'class' => 'GDPR\Action\PrivacyManager:getWidgetTermById'],
['method' => 'post', 'path' =>'/api/surfer/unsubnewsrequest', 'class' => 'GDPR\Action\UsersRequests:insertUnsubscribeNewsRequest'],
['method' => 'post', 'path' =>'/api/surfer/unsuballrequest', 'class' => 'GDPR\Action\UsersRequests:insertUnsubscribeAllRequest'],
['method' => 'post', 'path' =>'/api/widget/userrequest', 'class' => 'GDPR\Action\UsersRequests:insertSubscriptionRequest'],
['method' => 'get', 'path' =>'/api/surfer/userrequest', 'class' => 'GDPR\Action\UsersRequests:insertSubscriptionRequestFromLink'],
['method' => 'put', 'path' =>'/api/owner/term/{id}', 'class' => 'GDPR\Action\Terms:updateTerm'],
['method' => 'post', 'path' =>'/api/owner/term', 'class' => 'GDPR\Action\Terms:insertTerm'],
['method' => 'get', 'path' =>'/api/owner/term', 'class' => 'GDPR\Action\Terms:getAllTerms'],
['method' => 'get', 'path' =>'/api/owner/term/{id}', 'class' => 'GDPR\Action\Terms:getTerm'],
['method' => 'get', 'path' =>'/api/owner/termfilter', 'class' => 'GDPR\Action\Terms:termsAndTreatsFW'],
['method' => 'post', 'path' =>'/api/owner/termcopy', 'class' => 'GDPR\Action\Terms:termCopy'],
['method' => 'delete', 'path' =>'/api/owner/term/{id}', 'class' => 'GDPR\Action\Terms:termDelete'],
['method' => 'get', 'path' =>'/api/domain/loadall', 'class' => 'GDPR\Action\Owners:loadAllDomains'],
['method' => 'get', 'path' =>'/api/owner/termspages', 'class' => 'GDPR\Action\TermPages:getTermsPages'],
['method' => 'get', 'path' =>'/api/owner/termspages/{termId}', 'class' => 'GDPR\Action\TermPages:getTermPages'],
['method' => 'get', 'path' =>'/api/owner/profile', 'class' => 'GDPR\Action\Owners:getOwners'],
['method' => 'get', 'path' =>'/api/owner/profile/{id}', 'class' => 'GDPR\Action\Owners:getOwnerById'],
['method' => 'post', 'path' =>'/api/owner/profile', 'class' => 'GDPR\Action\Owners:newOwner'],
['method' => 'put', 'path' =>'/api/owner/profile/{id}', 'class' => 'GDPR\Action\Owners:updateOwner'],
['method' => 'put', 'path' =>'/api/owner/config/{id}', 'class' => 'GDPR\Action\Owners:updateOwnerProfile'],
['method' => 'post', 'path' =>'/api/owner/privacygrp', 'class' => 'GDPR\Action\PrivacyManager:searchPrivacyGrouped'],
['method' => 'post', 'path' =>'/api/owner/privacyusers', 'class' => 'GDPR\Action\PrivacyManager:privacyUsers'],
['method' => 'put', 'path' =>'/api/owner/userlastdata/{id}', 'class' => 'GDPR\Action\Users:updateMainData'],
['method' => 'post', 'path' =>'/api/owner/userterms', 'class' => 'GDPR\Action\Users:updateTerms'],
['method' => 'get', 'path' =>'/api/owner/privacy', 'class' => 'GDPR\Action\PrivacyManager:searchPrivacy'],
['method' => 'get', 'path' =>'/api/owner/privacy/{id}', 'class' => 'GDPR\Action\PrivacyManager:getPrivacy'],
['method' => 'get', 'path' =>'/api/surfer/privacy/{id}', 'class' => 'GDPR\Action\PrivacyManager:getPrivacy'],
['method' => 'get', 'path' =>'/api/surfer/privacybyeod', 'class' => 'GDPR\Action\PrivacyManager:getPrivacyiesByEmailOwnerDomain'],
['method' => 'get', 'path' =>'/api/surfer/privacybye', 'class' => 'GDPR\Action\PrivacyManager:getPrivacyByEmail'],
['method' => 'delete', 'path' =>'/api/surfer/privacybye/{email}', 'class' => 'GDPR\Action\Users:deleteUserSubscriptions'],
['method' => 'put', 'path' =>'/api/surfer/dbloptvis', 'class' => 'GDPR\Action\DeferredPrivacies:setVisited'],
['method' => 'put', 'path' =>'/api/owner/treatment/{code}', 'class' => 'GDPR\Action\Treatments:updateTreatment'],
['method' => 'post', 'path' =>'/api/owner/treatment', 'class' => 'GDPR\Action\Treatments:newTreatment'],
['method' => 'get', 'path' =>'/api/owner/treatment', 'class' => 'GDPR\Action\Treatments:getAllTreatments'],
['method' => 'get', 'path' =>'/api/owner/treatment/{code}', 'class' => 'GDPR\Action\Treatments:getTreatment'],
['method' => 'get', 'path' =>'/api/owner/domain', 'class' => 'GDPR\Action\Owners:getDomains'],
['method' => 'put', 'path' =>'/api/owner/operator/{id}', 'class' => 'GDPR\Action\Operators:updateOperator'],
['method' => 'post', 'path' =>'/api/owner/operator', 'class' => 'GDPR\Action\Operators:newOperator'],
['method' => 'get', 'path' =>'/api/owner/operator', 'class' => 'GDPR\Action\Operators:getAllOperators'],
['method' => 'get', 'path' =>'/api/owner/operator/{id}', 'class' => 'GDPR\Action\Operators:getOperator'],
['method' => 'post', 'path' =>'/api/owner/usersearch', 'class' => 'GDPR\Action\Users:search'],
['method' => 'get', 'path' =>'/api/owner/usersearch/{email}', 'class' => 'GDPR\Action\Users:privacyUser'],
['method' => 'post', 'path' =>'/api/owners/usersupfile/{uid}', 'class' => 'GDPR\Action\PrivacyManager:uploadUserPrivacy'],
['method' => 'get', 'path' =>'/api/owner/userrequest', 'class' => 'GDPR\Action\UsersRequests:retrieve'],
['method' => 'get', 'path' =>'/api/owner/userrequesto', 'class' => 'GDPR\Action\UsersRequests:retrieveOpen'],
['method' => 'get', 'path' =>'/api/owner/userrequestsendm', 'class' => 'GDPR\Action\Emails\Emails:sendPrivaciesAfterRequest'],
['method' => 'put', 'path' =>'/api/owner/userrequestc/{id}', 'class' => 'GDPR\Action\UsersRequests:closeRequest'],
['method' => 'post', 'path' =>'/api/import/users', 'class' => 'GDPR\Action\PrivacyManager:import'],
['method' => 'get', 'path' =>'/api/customercare/operator', 'class' => 'GDPR\Action\CustomerCares:getOperators'],
['method' => 'get', 'path' =>'/api/customercare/operator/{id}', 'class' => 'GDPR\Action\CustomerCares:getOperator'],
['method' => 'post', 'path' =>'/api/customercare/operator', 'class' => 'GDPR\Action\CustomerCares:newOperator'],
['method' => 'put', 'path' =>'/api/customercare/operator/{id}', 'class' => 'GDPR\Action\CustomerCares:updateOperator'],
['method' => 'get', 'path' =>'/api/customercare/user', 'class' => 'GDPR\Action\CustomerCare:getUsers'],
['method' => 'get', 'path' =>'/api/customercare/user/{id}', 'class' => 'GDPR\Action\CustomerCare:getUser'],
['method' => 'get', 'path' =>'/api/customercare/owner', 'class' => 'GDPR\Action\CustomerCares:getOwners'],
['method' => 'get', 'path' =>'/api/customercare/widget', 'class' => 'GDPR\Action\CustomerCares:getWidgets'],
['method' => 'put', 'path' =>'/api/customercare/deactivateowner/{id}', 'class' => 'GDPR\Action\CustomerCares:deactivate'],
['method' => 'put', 'path' =>'/api/customercare/activateowner/{id}', 'class' => 'GDPR\Action\CustomerCares:activate'],
['method' => 'get', 'path' =>'/api/owner/termtosign/{language}/{termId}', 'class' => 'GDPR\Action\PrivacyManager:toSuscribeTerm'],
['method' => 'post', 'path' =>'/api/owner/user', 'class' => 'GDPR\Action\PrivacyManager:savePlainPrivacy'],
['method' => 'post', 'path' =>'/api/auth/login', 'class' => 'GDPR\Action\Auth:login'],
['method' => 'post', 'path' =>'/api/auth/chpw', 'class' => 'GDPR\Action\Users:changePassword'],
['method' => 'post', 'path' =>'/api/auth/logout', 'class' => 'GDPR\Action\Auth:logout'],
['method' => 'get', 'path' =>'/api/auth/user', 'class' => 'GDPR\Action\Auth:user'],
['method' => 'get', 'path' =>'/api/auth/pwdres/{user}', 'class' => 'GDPR\Action\Auth:resetPasswordEmail'],
['method' => 'post', 'path' =>'/api/auth/pwdres', 'class' => 'GDPR\Action\Auth:resetPassword'],
['method' => 'get', 'path' =>'/upgrade/allow/{domainid}/{pathid}/{email}', 'class' => 'GDPR\Action\Subscribers:allow'],
['method' => 'get', 'path' =>'/upgrade/disallow/{domainid}/{pathid}/{email}', 'class' => 'GDPR\Action\Subscribers:disallow'],
['method' => 'get', 'path' =>'/upgrade/list/{domainid}/{pathid}/', 'class' => 'GDPR\Action\Subscribers:list'],
['method' => 'get', 'path' =>'/upgrade/domain', 'class' => 'GDPR\Action\Subscribers:domainList'],
['method' => 'post', 'path' =>'/upgrade/allow/{domainid}/{pathid}/{email}', 'class' => 'GDPR\Action\Subscribers:create'],
['method' => 'post', 'path' =>'/api/adapters/{connector}/{adapter}/{action}', 'class' => 'GDPR\Action\ShareSubscriberList:create'],
['method' => 'get', 'path' =>'/api/adapters/{connector}/{adapter}/{action}', 'class' => 'GDPR\Action\ShareSubscriberList:list'],
['method' => 'post', 'path' => '/api/import/dataone/upgrade',
    'class' => 'GDPR\Action\Import\DataONEUpgrade:import'
],
['method' => 'post', 'path' =>
    '/api/import/mailone/newsletter',
    'class' => 'GDPR\Action\Import\MailONENewsletter:import'
],
['method' => 'post', 'path' =>
    '/api/import/abs/structure/reservation',
    'class' => 'GDPR\Action\Import\ABSReservation:importStructure'
],
['method' => 'post', 'path' =>
    '/api/import/abs/portal/reservation',
    'class' => 'GDPR\Action\Import\ABSReservation:importPortal'
],
['method' => 'post', 'path' =>
    '/api/import/abs/enquiry',
    'class' => 'GDPR\Action\Import\ABSEnquiry:import'
],
['method' => 'post', 'path' =>
    '/api/import/abs/storeone',
    'class' => 'GDPR\Action\Import\StoreONE:import'
],
['method' => 'post', 'path' =>
    '/api/import/advancedimporter/preset',
    'class' => 'GDPR\Action\Import\AdvancedImporter:preset'
],
['method' => 'post', 'path' =>
    '/api/import/advancedimporter/import',
    'class' => 'GDPR\Action\Import\AdvancedImporter:import'
]
];

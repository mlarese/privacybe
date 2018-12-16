<?php
// Routes
/******************************
 * bi
 ******************************/
return [
    [
        'method' => 'get',
        'path' => '/dimensions',
        'class' => 'GDPR\Action\Bi:retrieveDimensions',
    ],
    [
        'method' => 'get',
        'path' => '/ownerping',
        'class' => 'GDPR\Action\Bi:ownerPing',
    ],
    [
        'method' => 'get',
        'path' => '/ownerprivacy/{id}',
        'class' => 'GDPR\Action\Bi:ownerPrivacy',
    ],
    [
        'method' => 'get',
        'path' => '/ownerprivacy',
        'class' => 'GDPR\Action\Bi:ownerPrivacies',
    ],
    [
        'method' => 'post',
        'path' => '/ownerprivacy',
        'class' => 'GDPR\Action\Bi:ownerPrivacyAdd',
    ],
    [
        'method' => 'get',
        'path' => '/ownerverifyflag/{id}',
        'class' => 'GDPR\Action\Bi:ownerVerifyFlag',
    ],
    [
        'method' => 'get',
        'path' => '/ownerprofile/{id}',
        'class' => 'GDPR\Action\Bi:ownerProfile',
    ],
    [
        'method' => 'get',
        'path' => '/ownersearch/{id}',
        'class' => 'GDPR\Action\Bi:ownerSearchCollection',
    ],
    [
        'method' => 'post',
        'path' => '/ownersearch',
        'class' => 'GDPR\Action\Bi:ownerSearch',
    ]
];

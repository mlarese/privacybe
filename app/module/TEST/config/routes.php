<?php
// Routes
return [
    ['method' => 'get', 'path' => '/welcome', 'class' => 'GDPR\Action\Test:welcome'],
    ['method' => 'get', 'path' => '/enc', 'class' => 'GDPR\Action\Test:testEnc'],
    ['method' => 'get', 'path' => '/encread', 'class' => 'GDPR\Action\Test:testEncRead'],
    ['method' => 'get', 'path' => '/encdec', 'class' => 'GDPR\Action\Test:testEncDec'],
    ['method' => 'get', 'path' => '/dimensions/{ownerId}', 'class' => 'GDPR\Action\Bi:retrieveDimensions'],
    ['method' => 'post', 'path' => '/upload', 'class' => 'GDPR\Action\Test:upload'],
    ['method' => 'get', 'path' => '/email', 'class' => 'GDPR\Action\Emails\Emails:privacyRequestTest'],
    ['method' => 'get', 'path' => '/generic', 'class' => 'GDPR\Action\Emails\Emails:generic'],
    ['method' => 'get', 'path' => '/dblopt', 'class' => 'GDPR\Action\Emails\Emails:doubleOptinConfirm'],
    ['method' => 'put', 'path' => '/dblopFtvis', 'class' => 'GDPR\Action\DeferredPrivacies:doubleOptinVisited'],
    ['method' => 'post', 'path' => '/import', 'class' => 'GDPR\Action\PrivacyManager:import'],
    ['method' => 'post', 'path' => '/usersupfile/{uid}', 'class' => 'GDPR\Action\PrivacyManager:uploadUserPrivacy'],
    ['method' => 'get', 'path' => '/welcomeAlt', 'class' => 'TEST\Action\Test:testAnotherMiddleware']

];
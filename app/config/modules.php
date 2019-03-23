<?php
return [
    '/GDPR/' => array('name' => 'gdpr', 'namespace' => 'GDPR', 'group' => null,
        'middleware' => ["cors", "jwt"]),
    '/API/' => array('name' => 'API', 'namespace' => 'API', 'group' => '/api/oauth',
        'middleware' => ["cors"]),
    '/BI/' => array('name' => 'BI', 'namespace' => 'BI', 'group' => '/api/bi',
        'middleware' => ["cors", "jwt"]),
    '/TEST/' => array('name' => 'TEST', 'namespace' => 'TEST', 'group' => '/api/test',
        'middleware' => ["cors", "oauth2","--test"])

];
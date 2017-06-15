<?php
/**
 * Configuration settings used by all of the examples.
 *
 * Specify your eBay application keys in the appropriate places.
 *
 * Be careful not to commit this file into an SCM repository.
 * You risk exposing your eBay application keys to more people than intended.
 */
return [
    'sandbox' => [
        'credentials' => [
            'devId' => '',
            'appId' => '',
            'certId' => '',
        ],
        'authToken' => '',
        'oauthUserToken' => '',
        'ruName' => ''
    ],
    'production' => [
        'credentials' => [
            'devId' => 'YOUR_PRODUCTION_DEVID_APPLICATION_KEY',
            'appId' => 'YOUR_PRODUCTION_APPID_APPLICATION_KEY',
            'certId' => 'YOUR_PRODUCTION_CERTID_APPLICATION_KEY',
        ],
        'authToken' => 'YOUR_PRODUCTION_USER_TOKEN_APPLICATION_KEY',
        'oauthUserToken' => 'YOUR_PRODUCTION_OAUTH_USER_TOKEN',
        'ruName' => 'YOUR_PRODUCTION_RUNAME'
    ]
];

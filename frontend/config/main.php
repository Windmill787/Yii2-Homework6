<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'controllerMap' => [
        'comments' => 'yii2mod\comments\controllers\ManageController',
        /* Also you can override some controller properties in following way:
        'comments' => [
            'class' => 'yii2mod\comments\controllers\ManageController',
            'searchClass' => [
                'class' => 'yii2mod\comments\models\search\CommentSearch',
                'pageSize' => 25
            ],
            'indexView' => 'custom path to index view file',
            'updateView' => 'custom path to update view file',
        ], */
    ],
    'modules' => [
        'comment' => [
            'class' => 'yii2mod\comments\Module',
        ],
    ],
    'components' => [
        'eauth' => [
            'class' => 'nodge\eauth\EAuth',
            'popup' => true, // Use the popup window instead of redirecting.
            'cache' => false, // Cache component name or false to disable cache. Defaults to 'cache' on production environments.
            'cacheExpire' => 0, // Cache lifetime. Defaults to 0 - means unlimited.
            'httpClient' => [
                // uncomment this to use streams in safe_mode
                //'useStreamsFallback' => true,
            ],
            'services' => [ // You can change the providers and their classes.
                'google' => [
                    // register your app here: https://code.google.com/apis/console/
                    'class' => 'nodge\eauth\services\GoogleOAuth2Service',
                    'clientId' => '1060355684369-s08tokc0fmfmtjg7ib3gke3dbtf3ojc3.apps.googleusercontent.com',
                    'clientSecret' => 'XIfK6fHJ7nReEXbj6kMatIcl',
                    'title' => 'Google',
                ],
                'twitter' => [
                    // register your app here: https://dev.twitter.com/apps/new
                    'class' => 'nodge\eauth\services\TwitterOAuth1Service',
                    'key' => 'Mvt65Tx0V1DAH0pzKEN92kuzC',
                    'secret' => 'kf9L2ovn8J39YMIrv7FW8c0l4lwvEP88HEp0L5ID9P1bgn7WH9',
                ],
                'facebook' => [
                    // register your app here: https://developers.facebook.com/apps/
                    'class' => 'nodge\eauth\services\FacebookOAuth2Service',
                    'clientId' => '939717799494106',
                    'clientSecret' => 'd6c7a90a92f5dd8904a7a20e03e22d4e',
                ],
                'github' => [
                    // register your app here: https://github.com/settings/applications
                    'class' => 'nodge\eauth\services\GitHubOAuth2Service',
                    'clientId' => 'fd6fc691a1f324b611a8',
                    'clientSecret' => 'd7f0602baabb438762ecbeb117955b43a15801aa',
                ],
                'vkontakte' => [
                    // register your app here: https://vk.com/editapp?act=create&site=1
                    'class' => 'nodge\eauth\services\VKontakteOAuth2Service',
                    'clientId' => '5835432',
                    'clientSecret' => 'JoUoADwCeQEYa1Nj8509',
                    'title' => 'VKontakte',
                ],
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'edgardmessias\assets\nprogress\NProgressAsset' => [
                    'configuration' => [
                        'minimum' => 0.08,
                        'showSpinner' => true,
                    ],
                    'page_loading' => true,
                    'pjax_events' => true,
                    'jquery_ajax_events' => true,
                ],
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'frontend\models\SiteUser',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logFile' => '@app/runtime/logs/eauth.log',
                    'categories' => ['nodge\eauth\*'],
                    'logVars' => []
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'view' => [
            'theme' => [
                'basePath' => '@webroot/themes/grey',
                'baseUrl' => '@web/themes/grey',
            ],
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'class' => 'common\widgets\MultiLang\components\UrlManager',
            'languages' => ['ru', 'en'],
            'enableDefaultLanguageUrlCode' => true,
            'rules' => [
            ],
        ],
        'i18n' => [
            'translations' => [
                'eauth' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/messages',
                ],
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/messages',
                    'sourceLanguage' => 'en',
                ],
                'yii2mod.comments' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii2mod/comments/messages',
                ],
            ],
        ],
    ],
    'params' => $params,
];

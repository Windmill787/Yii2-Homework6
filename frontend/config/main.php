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
                    'clientId' => '...',
                    'clientSecret' => '...',
                    'title' => 'Google',
                ],
                'twitter' => [
                    // register your app here: https://dev.twitter.com/apps/new
                    'class' => 'nodge\eauth\services\TwitterOAuth1Service',
                    'key' => '...',
                    'secret' => '...',
                ],
                'yandex' => [
                    // register your app here: https://oauth.yandex.ru/client/my
                    'class' => 'nodge\eauth\services\YandexOAuth2Service',
                    'clientId' => '...',
                    'clientSecret' => '...',
                    'title' => 'Yandex',
                ],
                'facebook' => [
                    // register your app here: https://developers.facebook.com/apps/
                    'class' => 'nodge\eauth\services\FacebookOAuth2Service',
                    'clientId' => '...',
                    'clientSecret' => '...',
                ],
                'yahoo' => [
                    'class' => 'nodge\eauth\services\YahooOpenIDService',
                    //'realm' => '*.example.org', // your domain, can be with wildcard to authenticate on subdomains.
                ],
                'linkedin' => [
                    // register your app here: https://www.linkedin.com/secure/developer
                    'class' => 'nodge\eauth\services\LinkedinOAuth1Service',
                    'key' => '...',
                    'secret' => '...',
                    'title' => 'LinkedIn (OAuth1)',
                ],
                'linkedin_oauth2' => [
                    // register your app here: https://www.linkedin.com/secure/developer
                    'class' => 'nodge\eauth\services\LinkedinOAuth2Service',
                    'clientId' => '...',
                    'clientSecret' => '...',
                    'title' => 'LinkedIn (OAuth2)',
                ],
                'github' => [
                    // register your app here: https://github.com/settings/applications
                    'class' => 'nodge\eauth\services\GitHubOAuth2Service',
                    'clientId' => '...',
                    'clientSecret' => '...',
                ],
                'live' => [
                    // register your app here: https://account.live.com/developers/applications/index
                    'class' => 'nodge\eauth\services\LiveOAuth2Service',
                    'clientId' => '...',
                    'clientSecret' => '...',
                ],
                'steam' => [
                    'class' => 'nodge\eauth\services\SteamOpenIDService',
                    //'realm' => '*.example.org', // your domain, can be with wildcard to authenticate on subdomains.
                    'apiKey' => '...', // Optional. You can get it here: https://steamcommunity.com/dev/apikey
                ],
                'instagram' => [
                    // register your app here: https://instagram.com/developer/register/
                    'class' => 'nodge\eauth\services\InstagramOAuth2Service',
                    'clientId' => '...',
                    'clientSecret' => '...',
                ],
                'vkontakte' => [
                    // register your app here: https://vk.com/editapp?act=create&site=1
                    'class' => 'nodge\eauth\services\VKontakteOAuth2Service',
                    'clientId' => '...',
                    'clientSecret' => '...',
                ],
                'mailru' => [
                    // register your app here: http://api.mail.ru/sites/my/add
                    'class' => 'nodge\eauth\services\MailruOAuth2Service',
                    'clientId' => '...',
                    'clientSecret' => '...',
                ],
                'odnoklassniki' => [
                    // register your app here: http://dev.odnoklassniki.ru/wiki/pages/viewpage.action?pageId=13992188
                    // ... or here: http://www.odnoklassniki.ru/dk?st.cmd=appsInfoMyDevList&st._aid=Apps_Info_MyDev
                    'class' => 'nodge\eauth\services\OdnoklassnikiOAuth2Service',
                    'clientId' => '...',
                    'clientSecret' => '...',
                    'clientPublic' => '...',
                    'title' => 'Odnoklas.',
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
            'identityClass' => 'common\models\SiteUser',
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
            ],
        ],
    ],
    'params' => $params,
];

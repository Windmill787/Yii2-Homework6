<?php
return [
    'bootstrap' => ['log'],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'requestCrawler' => \common\crawler\services\RequestCrawlerServiceBuilder::build('json', '/file'),
        'json' => [
            'class' => 'common\crawler\serializers\JsonSerializer',
        ],
        'xml' => [
            'class' => 'common\crawler\serializers\XmlSerializer',
        ],
        'log' => [
            'flushInterval' => 1,
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'exportInterval' => 1,
                    'levels' => ['info', 'trace', 'error'],
                    'logFile' => '@common/crawler/logs/CrawlerLog.log',
                    'logVars' => []
                ],
            ],
        ],
    ],
];

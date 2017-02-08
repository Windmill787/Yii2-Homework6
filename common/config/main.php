<?php
return [
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
        ]
    ],
];

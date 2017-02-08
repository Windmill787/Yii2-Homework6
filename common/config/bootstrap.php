<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');

Yii::$container->set(\common\crawler\interfaces\SerializerInterface::class,
    \common\crawler\serializers\JsonSerializer::class);
Yii::$container->set('requestCrawler', [
    'class' => \common\crawler\components\RequestCrawler::class,
    'path' => '/file',
    'on morfAndUpload' => function ($event) {
        Yii::info("Data was morfed and saved to: ".$event->sender->path);
    },
]);
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
    'on encodeAndUpload' => function ($event, $message = "Data was encoded and saved to: ") {
        Yii::info($message.$event->sender->getPath(), 'info');

        Yii::$app->session->setFlash(
            'success',
            $message.$event->sender->getPath()
        );
    },
]);

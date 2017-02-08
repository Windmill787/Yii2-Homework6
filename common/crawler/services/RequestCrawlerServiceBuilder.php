<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 25.01.17
 * Time: 19:32
 */

namespace common\crawler\services;

use common\crawler\components\RequestCrawler;
use Yii;

class RequestCrawlerServiceBuilder
{
    public static function build($serializerType, $path)
    {
        return function () use ($serializerType, $path) {
            if ($serializerType == 'json'){
                $serializer = Yii::$app->json;
            } else if ($serializerType == 'xml') {
                $serializer = Yii::$app->xml;
            } else {
                throw new \Exception('Unknown serialized type');
            }
            $requestCrawler = new RequestCrawler($serializer, ['path' => $path]);
            return $requestCrawler;
        };
    }

}
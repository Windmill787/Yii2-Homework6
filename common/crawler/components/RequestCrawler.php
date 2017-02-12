<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 25.01.17
 * Time: 13:20
 */

namespace common\crawler\components;

use common\crawler\interfaces\SerializerInterface;
use common\crawler\services\InputEvent;
use yii\base\Component;
use yii\base\Event;

class RequestCrawler extends Component
{
    public $path;
    public $serializerType;

    const EVENT_ENCODE_AND_UPLOAD = 'encodeAndUpload';

    public function __construct(SerializerInterface $serializerType, $config = [])
    {
        $this->serializerType = $serializerType;
        parent::__construct($config);
    }

    public function getPath()
    {
        return __DIR__.$this->path;
    }

    public function encodeAndUpload($data)
    {
        $array = preg_split('/[, ]/', $data);
        $encodedData = $this->serializerType->encode($array);

        $event = new InputEvent(['data' => $data]);

        $this->trigger(self::EVENT_ENCODE_AND_UPLOAD, $event);

        return file_put_contents($this->getPath(), $encodedData);
    }

    public function init()
    {
        parent::init();
    }
}
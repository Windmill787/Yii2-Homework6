<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 25.01.17
 * Time: 13:20
 */

namespace common\crawler\components;

use common\crawler\interfaces\SerializerInterface;
use yii\base\Component;
use Yii;
use yii\base\Event;

class RequestCrawler extends Component
{
    public $path;
    public $serializerType;

    const EVENT_MORF_AND_UPLOAD = 'morfAndUpload';

    public function __construct(SerializerInterface $serializerType, $config = [])
    {
        $this->serializerType = $serializerType;
        parent::__construct($config);
    }

    public function getPath()
    {
        return __DIR__.$this->path;
    }

    public function morfAndUpload($data)
    {
        $array = preg_split('/[, ]/', $data);
        $morfedData = Yii::$app->get('requestCrawler')->serializerType->morf($array);

        $this->trigger(self::EVENT_MORF_AND_UPLOAD);

        return file_put_contents($this->getPath(), $morfedData);
    }

    public function init()
    {
        parent::init();
    }
}
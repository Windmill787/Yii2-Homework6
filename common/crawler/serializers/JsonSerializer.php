<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 25.01.17
 * Time: 13:49
 */

namespace common\crawler\serializers;

use common\crawler\interfaces\SerializerInterface;

class JsonSerializer implements SerializerInterface
{
    /**
     * @inheritdoc
     */
    public function morf($data)
    {
        return json_encode($data);
    }
}
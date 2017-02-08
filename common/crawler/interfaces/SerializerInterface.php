<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 25.01.17
 * Time: 13:34
 */

namespace common\crawler\interfaces;

interface SerializerInterface
{
    /**
    * @param $data
    * @return string
    */
    public function morf($data);
}
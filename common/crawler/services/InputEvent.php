<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 08.02.17
 * Time: 15:30
 */

namespace common\crawler\services;

use yii\base\Event;

class InputEvent extends Event
{
    public $data;
}
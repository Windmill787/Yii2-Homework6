<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 28.12.16
 * Time: 16:41
 */

namespace console\controllers;

use yii\console\Controller;

class HelloController extends Controller
{
    public $message;

    public function options($optionID)
    {
        return ['message'];
    }

    public function optionAliases()
    {
        return ['m' => 'message'];
    }

    public function actionIndex()
    {
        echo $this->message . "\n";
    }
}
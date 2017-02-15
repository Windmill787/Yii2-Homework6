<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 06.01.17
 * Time: 23:26
 */

namespace console\controllers;

use yii\helpers\Console;
use Yii;
use yii\console\Controller;

class InsertController extends Controller
{
    /**
     * data insert into test table
     * @return int
     */

    public $name = 'data';

    public function options($actionID)
    {
        return ["name"];
    }

    public function optionAliases()
    {
        return ["n" => "name"];
    }

    public function actionIndex() {

            Console::startProgress(0,100);
            for($i = 0; $i <= 100; $i++) {
                Yii::$app->db->createCommand()->
                insert('test', ['name' => $this->name.' '.$i,])->execute();
                usleep(50);
                Console::updateProgress($i,100);
            }

        return 0;
    }
}
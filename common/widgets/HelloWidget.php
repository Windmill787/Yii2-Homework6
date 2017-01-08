<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 24.12.16
 * Time: 17:51
 */

namespace common\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use Yii;

class HelloWidget extends Widget
{
    public $username = 'Guest';
    public $message;

    public function init()
    {
        parent::init();
        if (isset(Yii::$app->user->identity->username)){
            $this->username = Yii::$app->user->identity->username;
        }
        $this->message = Yii::t('app', 'Hello').', '.Yii::t('app', $this->username);
    }

    public function run()
    {
        return Html::encode($this->message);
    }

}
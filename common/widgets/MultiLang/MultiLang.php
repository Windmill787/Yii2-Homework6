<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 25.12.16
 * Time: 20:48
 */

namespace common\widgets\MultiLang;

use yii\bootstrap\Widget;

class MultiLang extends Widget
{
    public $cssClass;
    public function init(){}

    public function run() {

        return $this->render('view', [
            'cssClass' => $this->cssClass
        ]);

    }
}
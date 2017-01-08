<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 25.12.16
 * Time: 20:46
 */

namespace frontend\widgets\MultiLang;

use yii\helpers\Html;
use Yii;
?>

<div class="btn-group <?= $cssClass; ?>">


            <?= Html::a('Go to English', array_merge(
                \Yii::$app->request->get(),
                [\Yii::$app->controller->route, 'language' => 'en']
            )); ?>

            <br>

            <?= Html::a('Перейти на русский', array_merge(
                \Yii::$app->request->get(),
                [\Yii::$app->controller->route, 'language' => 'ru']
            )); ?>

</div>
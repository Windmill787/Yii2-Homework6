<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 26.01.17
 * Time: 12:29
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \common\models\CrawlerForm */

$this->title = Yii::t('app', 'Result');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="text-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php print_r($model) ?>

</div>
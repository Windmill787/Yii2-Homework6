<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Homework */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Homeworks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homework-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'homework_name',
            'thema_id',
        ],
    ]) ?>

</div>

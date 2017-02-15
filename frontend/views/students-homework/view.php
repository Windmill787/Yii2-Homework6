<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StudentsHomework */

$this->title = $model->students_id;
$this->params['breadcrumbs'][] = ['label' => 'Students Homeworks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-homework-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'students_id',
            'homework_id',
        ],
    ]) ?>

</div>

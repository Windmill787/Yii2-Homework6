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

    <p>
        <?= Html::a('Update', ['update', 'students_id' => $model->students_id, 'homework_id' => $model->homework_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'students_id' => $model->students_id, 'homework_id' => $model->homework_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'students_id',
            'homework_id',
        ],
    ]) ?>

</div>

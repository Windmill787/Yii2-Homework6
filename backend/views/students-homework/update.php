<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StudentsHomework */

$this->title = 'Update Students Homework: ' . $model->students_id;
$this->params['breadcrumbs'][] = ['label' => 'Students Homeworks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->students_id, 'url' => ['view', 'students_id' => $model->students_id, 'homework_id' => $model->homework_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="students-homework-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

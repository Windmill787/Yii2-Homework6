<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\StudentsHomework */

$this->title = 'Create Students Homework';
$this->params['breadcrumbs'][] = ['label' => 'Students Homeworks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-homework-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

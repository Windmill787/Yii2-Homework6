<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StudentsHomework */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-homework-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $departmentOptions = \common\models\Students::find()->all(); ?>
    <?= $form->field($model, 'students_id')->
    dropDownList(yii\helpers\ArrayHelper::map($departmentOptions,
        'id', 'student_name')) ?>

    <?php $departmentOptions = \common\models\Homework::find()->all(); ?>
    <?= $form->field($model, 'homework_id')->
    dropDownList(yii\helpers\ArrayHelper::map($departmentOptions,
        'id', 'homework_name')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

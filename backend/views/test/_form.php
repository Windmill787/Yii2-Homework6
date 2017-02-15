<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 11.12.16
 * Time: 15:03
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="test-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student_name')->textInput(['autofocus' => true]) ?>

    <?php $departmentOptions = \common\models\Department::find()->all(); ?>
    <?= $form->field($model, 'department_id')->
    dropDownList(yii\helpers\ArrayHelper::map($departmentOptions,
        'id', 'department_name')) ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
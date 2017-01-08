<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 04.12.16
 * Time: 23:52
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<?php
$this->title = 'Delete';
$form = ActiveForm::begin([
    'id' => 'form',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Delete', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>
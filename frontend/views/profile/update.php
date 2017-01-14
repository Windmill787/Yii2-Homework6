<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 13.01.17
 * Time: 17:03
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SiteUser */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('app', 'Update Profile');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'username') ?>

            <?= $form->field($model, 'first_name') ?>

            <?= $form->field($model, 'last_name') ?>

            <?= $form->field($model, 'age') ?>

            <?php // $form->field($model, 'img')->fileInput() ?>

            <?= $form->field($model, 'email')->input('email', ['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Update'), ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

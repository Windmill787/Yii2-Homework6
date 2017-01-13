<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 13.01.17
 * Time: 16:46
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SiteUser */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('app', 'Profile');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="<?= $model->img ?>" alt="img">
                <div class="caption">
                    <p>Username: <?= $model->username ?></p>
                    <p>First Name: <?= $model->first_name ?></p>
                    <p>Last Name: <?= $model->last_name ?></p>
                    <p>Email: <?= $model->email ?></p>
                    <p>Age: <?= $model->age ?></p>
                    <p><a href="update" class="btn btn-primary" role="button">Update</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

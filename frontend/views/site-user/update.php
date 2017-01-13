<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 13.01.17
 * Time: 17:03
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SiteUser */

$this->title = Yii::t('app', 'Update Profile');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>

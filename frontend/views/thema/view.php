<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Thema */

$this->title = $model->thema_name;
$this->params['breadcrumbs'][] = ['label' => 'Themas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thema-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'thema_name',
        ],
    ]) ?>

    <p><a href="index" class="btn btn-default" role="button"><?=Yii::t('app', 'Back')?></a></p>

</div>

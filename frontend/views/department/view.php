<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use rmrevin\yii\module\Comments;

/* @var $this yii\web\View */
/* @var $model common\models\Department */

$this->title = $model->department_name;
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'department_name',
        ],
    ]) ?>

    <p><a href="index" class="btn btn-default" role="button"><?=Yii::t('app', 'Back')?></a></p>

    <?= Comments\widgets\CommentListWidget::widget([
    'entity' => 'model', // type and id
    ]); ?>

</div>

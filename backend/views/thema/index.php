<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ThemaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Themas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thema-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Thema', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'thema_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 03.12.16
 * Time: 23:13
 */

use yii\helpers\Html;

$this->title = 'Create';
?>

<div class="test-create">

    <h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

</div>
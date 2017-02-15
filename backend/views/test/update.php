<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 03.12.16
 * Time: 23:14
 */

use yii\helpers\Html;

$this->title = 'Update item '.$model->id;

?>
<div class="test-update">

    <h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

</div>
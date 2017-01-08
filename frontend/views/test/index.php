<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 03.12.16
 * Time: 21:45
 */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('app', 'Test Application');

echo Html::beginTag('table', ['border' => 2]);
?>
<?php
foreach ($data as $test) {

    echo Html::beginTag('tr');;
    foreach ($test as $test2) {
        echo Html::beginTag('td');
        echo Html::encode($test2);
        echo Html::endTag('td');
    }
    ?>
    <td><?= Html::a(Yii::t('app', 'View'), ['view', 'id' => $test->id], ['class' => 'btn btn-primary']); ?></td>
    <td><?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $test->id], ['class' => 'btn btn-primary']); ?></td>
    <td><?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $test->id], [
    'class' => 'btn btn-danger',
    'data' => [
        'confirm' => 'Are you sure you want to delete this item?',
        'method' => 'post',
    ],
]); ?>
<?php
    echo Html::endTag('tr');
}
echo Html::endTag('table');
echo '<br>';
$array = ArrayHelper::getValue($data, 'data.student_id');
?>
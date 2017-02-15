<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 25.12.16
 * Time: 20:46
 */

namespace frontend\widgets\MultiLang;

use Yii;
use yii\bootstrap\ButtonDropdown;
?>

<div class="btn-group <?= $cssClass; ?>">

    <?= ButtonDropdown::widget([
    'label' => Yii::t('app', 'Language'),
        'options' => [
        'class' => 'btn-lg btn-link',
        ],
            'dropdown' => [
                'items' => [
                    [
                        'label' => 'Go to English',
                        'url' => array_merge(
                            Yii::$app->request->get(),
                            [Yii::$app->controller->route, 'language' => 'en']
                        )
                    ],
                    [
                        'label' => 'Перейти на Русский',
                        'url' => array_merge(
                            Yii::$app->request->get(),
                            [Yii::$app->controller->route, 'language' => 'ru']
                        )
                    ]
                ]
            ]
    ]);
    ?>
</div>
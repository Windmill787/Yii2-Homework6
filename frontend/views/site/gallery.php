<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 09.01.17
 * Time: 17:48
 */

use yii\bootstrap\Carousel;

$this->title = Yii::t('app', 'Gallery');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-gallery">
    <div align="center">
        <h2><?= $this->title ?></h2>
    </div>

<?= Carousel::widget([
    'items' => [

        ['content' => '<img src="https://newevolutiondesigns.com/images/freebies/winter-wallpaper-7.jpg"/>',
         'caption' => '<h1>'.Yii::t('app', 'This is a Gallery').'</h1><p>'.Yii::t('app', 'Hope you enjoy').'</p>'
        ],

        ['content' => '<img src="https://newevolutiondesigns.com/images/freebies/winter-wallpaper-2.jpg"/>'],

        ['content' => '<img src="https://newevolutiondesigns.com/images/freebies/winter-wallpaper-15.jpg"/>',],

        ['content' => '<img src="https://newevolutiondesigns.com/images/freebies/winter-wallpaper-13.jpg"/>',],

        ['content' => '<img src="https://newevolutiondesigns.com/images/freebies/winter-wallpaper-11.jpg"/>',],

        ['content' => '<img src="https://newevolutiondesigns.com/images/freebies/winter-wallpaper-9.jpg"/>',],
    ]
]); ?>

</div>

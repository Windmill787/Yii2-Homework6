<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 23.12.16
 * Time: 20:22
 */

namespace frontend\assets;

use yii\web\AssetBundle;

class GreyAsset extends AssetBundle
{
    public $basePath = '@webroot/themes/grey';
    public $baseUrl = '@web/themes/grey';
    public $css = [
        'css/main_style.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
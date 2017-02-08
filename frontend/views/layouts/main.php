<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use common\widgets\HelloWidget;
use frontend\assets\GreyAsset;
use yii\widgets\Menu;
use edgardmessias\assets\nprogress\NProgressAsset;
use common\widgets\MultiLang\MultiLang;

$this->registerCssFile('@web/themes/grey/css/input.css');
NProgressAsset::register($this);
GreyAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::t('app', $this->title); ?></title>
    <?php $this->head() ?>

    <script>
        $('body').show();
        $('.version').text(NProgress.version);
        NProgress.start();
    </script>

</head>
<body class="wsite-theme-light tall-header-page wsite-page-index weeblypage-index">
<?php $this->beginBody() ?>

<div id="container">
    <table id="header">
        <tr>
            <td id="logo"><span class='wsite-logo'><a href='/'><span id="wsite-title"><?php echo Yii::t('app', Yii::$app->name); ?></span></a></span></td>
            <td id="header-right">
                <table>
                    <tr>
                        <td class="phone-number"></td>
                        <td class="social"></td>
                    </tr>
                </table>
                <div class="search"></div>
            </td>
        </tr>
    </table>

<div id="main">
    <div id="navigation">
    <?php
    $menuItems = [
            ['label' => Yii::t('app', 'Students'), 'url' => ['/students/index']],
            ['label' => Yii::t('app', 'Homework'), 'url' => ['/homework/index']],
            ['label' => Yii::t('app', 'Department'), 'url' => ['/department/index']],
            ['label' => Yii::t('app', 'Thema'), 'url' => ['/thema/index']],
            ['label' => Yii::t('app', 'Test'), 'url' => ['/test/index']],
            ['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']],
            ['label' => Yii::t('app', 'About'), 'url' => ['/site/about']],
            ];

            if(Yii::$app->user->isGuest)
            {
                $menuItems[] =
                    ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']];
                $menuItems[] =
                    ['label' => Yii::t('app', 'Signup'), 'url' => ['/site/registration']];
            }
            else {
                $menuItems[] =
                    ['label' => Yii::t('app', 'Profile'), 'url' => ['/profile/index']];
                $menuItems[] =
                    ['label' => Yii::t('app', 'Contact'), 'url' => ['/site/contact']];
                $menuItems[] =
                    ['label' => Yii::t('app', 'Gallery'), 'url' => ['/site/gallery']];
                $menuItems[] =
                    ['label' => Yii::t('app', 'Crawler'), 'url' => ['/crawler/index']];
                $menuItems[] =
                    ['label' => Yii::t('app', 'Logout').'('.Yii::$app->user->identity->username.')',
                        'url' => ['/site/logout'],
                        'template' => '<a href="{url}" data-method="post">{label}</a>',];

                /*
                ['label' => Yii::t('app', 'Logout').'('.Yii::$app->user->identity->username.')',
                        'url' => ['/site/logout'], ['data-method' => 'post']]
                */
            }

            echo Menu::widget([
                'options' => ['class' => 'nav'],
                'items' => $menuItems,
                ]);
    ?>
    <div class="clear"></div>
</div>

    <div id="container">
        <p align="right">
            <?= HelloWidget::widget(); ?>
        </p>
    </div>

    <?= MultiLang::widget(['cssClass'=>'pull-right language']); ?>

    <div class="banner-container">
        <div id="banner">
            <div class="wsite-header"></div>
        </div>
    </div>

    <div id="container">
        <div id='wsite-content' class='wsite-not-footer'>

        <?= Yii::t('app', $content); ?>
        </div>

        <div class="clear"></div>
    </div>
</div>

<footer id="footer">
    <div class="banner-container">
        <p>&copy; <?= Yii::t('app', 'My Company').' '.date('Y') ?></p>
        <p><?= Yii::powered() ?></p>
    </div>
</footer>
</div>

<script>
    NProgress.done();
    $('.fade').removeClass('out');
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
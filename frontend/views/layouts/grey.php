<?php
use yii\helpers\Html;
use yii\widgets\Menu;
use frontend\assets\GreyAsset;


$this->registerCssFile('@web/themes/grey/css/input.css');
GreyAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title><?php echo Html::encode($this->title); ?></title>
<meta property='og:site_name' content='<?php echo Html::encode($this->title); ?>' />
<meta property='og:title' content='<?php echo Html::encode($this->title); ?>' />
<meta property='og:description' content='<?php echo Html::encode($this->title); ?>' />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<link rel='stylesheet' type='text/css' href='<?php echo $this->theme->baseUrl; ?>css/main_style.css' title='wsite-theme-css' />
<?php $this->head(); ?>
</head>
<body class='wsite-theme-light tall-header-page wsite-page-index weeblypage-index'>
  <?php $this->beginBody(); ?>

<div id="container">
  <table id="header">
    <tr>
      <td id="logo"><span class='wsite-logo'><a href='/'><span id="wsite-title"><?php echo Html::encode(\Yii::$app->name); ?></span></a></span></td>
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
 <?php echo Menu::widget(array(
        'options' => array('class' => 'nav'),
        'items' => [
            ['label' => 'Students', 'url' => ['/students/index']],
            ['label' => 'Homework', 'url' => ['/homework/index']],
            ['label' => 'Department', 'url' => ['/department/index']],
            ['label' => 'Thema', 'url' => ['/thema/index']],
            ['label' => 'Test', 'url' => ['/test/index']],
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
          Yii::$app->user->isGuest ?
            array('label' => 'Login', 'url' => array('/site/login')) :
            array('label' => 'Logout (' . Yii::$app->user->identity->username .')' , 'url' => array('/site/logout')),
        ],
      )); ?>
      <div class="clear"></div>
    </div>




    <div class="banner-container">
      <div id="banner">
        <div class="wsite-header"></div>
      </div>
    </div>




    <div id="content">
      <div id='wsite-content' class='wsite-not-footer'>
         <?php echo $content; ?>
      </div>

      <div class="clear"></div>
    </div>




  </div>




  <div id="footer">
      <div class="banner-container">
    <?php echo Html::encode(\Yii::$app->name); ?>

    <div class="clear"></div>
  </div>
  </div>




</div>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
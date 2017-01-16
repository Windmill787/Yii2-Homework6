<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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

    <div id="hypercomments_widget"></div>
    <script type="text/javascript">
        _hcwp = window._hcwp || [];
        _hcwp.push({widget:"Stream", widget_id: 85676});
        (function() {
            if("HC_LOAD_INIT" in window)return;
            HC_LOAD_INIT = true;
            var lang = (navigator.language || navigator.systemLanguage || navigator.userLanguage || "en").substr(0, 2).toLowerCase();
            var hcc = document.createElement("script"); hcc.type = "text/javascript"; hcc.async = true;
            hcc.src = ("https:" == document.location.protocol ? "https" : "http")+"://w.hypercomments.com/widget/hc/85676/"+lang+"/widget.js";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hcc, s.nextSibling);
        })();
    </script>

    <a href="http://hypercomments.com" class="hc-link" title="comments widget">comments powered by HyperComments</a>

</div>

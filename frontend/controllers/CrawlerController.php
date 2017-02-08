<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 25.01.17
 * Time: 12:56
 */

namespace frontend\controllers;

use common\models\CrawlerForm;
use yii\web\Controller;
use Yii;

class CrawlerController extends Controller
{
    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new CrawlerForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //Yii::$container->get('requestCrawler')->morfAndUpload($model->field);
            Yii::$app->get('requestCrawler')->morfAndUpload($model->field);
            return $this->render('index', ['model' => $model]);
        } else {
            return $this->render('index', ['model' => $model]);
        }
    }
}
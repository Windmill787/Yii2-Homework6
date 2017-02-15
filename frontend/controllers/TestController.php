<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 03.12.16
 * Time: 21:42
 */

namespace frontend\controllers;

use common\models\Test;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex(){

        return $this->render('index', [
            'data' => Test::showAll(),
        ]);
    }

    public function actionView($id){

        return $this->render('view', [
            'data' => Test::showOne($id)
        ]);
    }

    public function actionCreate(){

        $model = new Test;

        $model->student_name = 'По умолчанию';
        $model->department_id = 1;

        if ($model->load(\Yii::$app->request->post()) && $model->save()){
            return $this->redirect('index');
        }
        else{
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }

    public function actionUpdate($id){

        $model = Test::editData($id);

        $model->loadDefaultValues();

        if ($model->load(\Yii::$app->request->post()) && $model->save()){
            print_r(\Yii::$app->request->post());
            //return $this->redirect(['view', 'id' => $model->id]);
        }
        else{
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id){

            Test::findOne($id)->delete();
            return $this->redirect(['index']);
    }

}
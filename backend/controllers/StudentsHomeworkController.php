<?php

namespace backend\controllers;

use Yii;
use common\models\StudentsHomework;
use common\models\StudentsHomeworkSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * StudentsHomeworkController implements the CRUD actions for StudentsHomework model.
 */
class StudentsHomeworkController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'create', 'update', 'delete', 'view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all StudentsHomework models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentsHomeworkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StudentsHomework model.
     * @param integer $students_id
     * @param integer $homework_id
     * @return mixed
     */
    public function actionView($students_id, $homework_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($students_id, $homework_id),
        ]);
    }

    /**
     * Creates a new StudentsHomework model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StudentsHomework();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'students_id' => $model->students_id, 'homework_id' => $model->homework_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing StudentsHomework model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $students_id
     * @param integer $homework_id
     * @return mixed
     */
    public function actionUpdate($students_id, $homework_id)
    {
        $model = $this->findModel($students_id, $homework_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'students_id' => $model->students_id, 'homework_id' => $model->homework_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing StudentsHomework model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $students_id
     * @param integer $homework_id
     * @return mixed
     */
    public function actionDelete($students_id, $homework_id)
    {
        $this->findModel($students_id, $homework_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StudentsHomework model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $students_id
     * @param integer $homework_id
     * @return StudentsHomework the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($students_id, $homework_id)
    {
        if (($model = StudentsHomework::findOne(['students_id' => $students_id, 'homework_id' => $homework_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

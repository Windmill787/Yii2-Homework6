<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 13.01.17
 * Time: 21:09
 */

namespace frontend\controllers;

use frontend\models\SiteUser;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use Exception;

/**
 * SiteUser controller
 */
class SiteUserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                    throw new Exception(Yii::t('app', 'You don\'t have permission for this page'));
                },
                'only' => ['index', 'update'],
                'rules' => [
                    [
                        'actions' => ['error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['index', 'update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all SiteUser model fields.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = $this->findModel(Yii::$app->user->id);

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SiteUser model.
     * If update is successful, the browser will be redirected to the 'index' page with updated information.
     * @return mixed
     */
    public function actionUpdate()
    {
        $model = $this->findModel(Yii::$app->user->id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the SiteUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SiteUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SiteUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('User does not exist');
        }
    }
}
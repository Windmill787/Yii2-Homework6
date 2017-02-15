<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 15.02.17
 * Time: 10:15
 */

namespace frontend\controllers;

use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;
use Yii;

class UserController extends ActiveController
{
    protected function verbs()
    {
        return [
            'index' => ['GET', 'OPTIONS', 'HEAD'],
        ];
    }

    public $modelClass = 'frontend\models\SiteUser';

    public function actions()
    {
        $actions = parent::actions();

        unset($actions['create'], $actions['delete']);

        return $actions;
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        if ($action === 'update') {
            if (!Yii::$app->user->can('updateUser'))
                throw new ForbiddenHttpException(sprintf('You can only %s articles that you\'ve created.', $action));
        }
    }



}
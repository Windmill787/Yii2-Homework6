<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 15.01.17
 * Time: 20:48
 */

namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\rbac\AuthorRule;


class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $rule = new AuthorRule;
        $auth->add($rule);

        $createCommentary = $auth->createPermission('createCommentary');
        $createCommentary->description = 'Create commentary';
        $auth->add($createCommentary);

        $updateCommentary = $auth->createPermission('updateCommentary');
        $updateCommentary->description = 'Update commentary';
        $auth->add($updateCommentary);

        $deleteCommentary = $auth->createPermission('deleteCommentary');
        $deleteCommentary->description = 'Delete commentary';
        $auth->add($deleteCommentary);

        $updateOwnCommentary = $auth->createPermission('updateOwnCommentary');
        $updateOwnCommentary->description = 'Update own commentary';
        $updateOwnCommentary->ruleName = $rule->name;
        $auth->add($updateOwnCommentary);
        $auth->addChild($updateOwnCommentary, $updateCommentary);

        $deleteOwnCommentary = $auth->createPermission('deleteOwnCommentary');
        $deleteOwnCommentary->description = 'Delete own commentary';
        $deleteOwnCommentary->ruleName = $rule->name;
        $auth->add($deleteOwnCommentary);
        $auth->addChild($deleteOwnCommentary, $deleteCommentary);

        $author = $auth->createRole('author');
        $author->description = 'Default user';
        $auth->add($author);
        $auth->addChild($author, $createCommentary);
        $auth->addChild($author, $updateOwnCommentary);
        $auth->addChild($author, $deleteOwnCommentary);

        $admin = $auth->createRole('admin');
        $admin->description = 'Super admin';
        $auth->add($admin);
        $auth->addChild($admin, $deleteCommentary);
        $auth->addChild($admin, $author);

        $auth->assign($author, 3);
        $auth->assign($author, 2);
        $auth->assign($admin, 1);
        $auth->assign($author, 4);
    }
}
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
use \rmrevin\yii\module\Comments\Permission;
use \rmrevin\yii\module\Comments\rbac\ItsMyComment;


class RbacController extends Controller
{
    public function actionInit()
    {
        $AuthManager = \Yii::$app->getAuthManager();
        $ItsMyCommentRule = new ItsMyComment();

        $AuthManager->add($ItsMyCommentRule);

        $AuthManager->add(new \yii\rbac\Permission([
            'name' => Permission::CREATE,
            'description' => 'Can create own comments',
        ]));
        $AuthManager->add(new \yii\rbac\Permission([
            'name' => Permission::UPDATE,
            'description' => 'Can update all comments',
        ]));
        $AuthManager->add(new \yii\rbac\Permission([
            'name' => Permission::UPDATE_OWN,
            'ruleName' => $ItsMyCommentRule->name,
            'description' => 'Can update own comments',
        ]));
        $AuthManager->add(new \yii\rbac\Permission([
            'name' => Permission::DELETE,
            'description' => 'Can delete all comments',
        ]));
        $AuthManager->add(new \yii\rbac\Permission([
            'name' => Permission::DELETE_OWN,
            'ruleName' => $ItsMyCommentRule->name,
            'description' => 'Can delete own comments',
        ]));

        /*
        $auth = Yii::$app->authManager;

        $rule = new AuthorRule;
        $auth->add($rule);

        $createCommentary = $auth->createPermission('createCommentary');
        $createCommentary->description = 'Create commentary';
        $auth->add($createCommentary);

        $updateCommentary = $auth->createPermission('updateCommentary');
        $updateCommentary->description = 'Update commentary';
        $auth->add($updateCommentary);

        $updateOwnCommentary = $auth->createPermission('updateOwnCommentary');
        $updateOwnCommentary->description = 'Update own commentary';
        $updateOwnCommentary->ruleName = $rule->name;
        $auth->add($updateOwnCommentary);
        $auth->addChild($updateOwnCommentary, $updateCommentary);

        $author = $auth->createRole('author');
        $author->description = 'Default user';
        $auth->add($author);
        $auth->addChild($author, $createCommentary);
        $auth->addChild($author, $updateOwnCommentary);

        $admin = $auth->createRole('admin');
        $admin->description = 'Super admin';
        $auth->add($admin);
        $auth->addChild($admin, $updateCommentary);
        $auth->addChild($admin, $author);

        $auth->assign($author, 3);
        $auth->assign($author, 2);
        $auth->assign($admin, 1);
        */
    }
}
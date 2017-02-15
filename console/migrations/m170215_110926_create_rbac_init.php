<?php

use yii\db\Migration;

class m170215_110926_create_rbac_init extends Migration
{
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $updateUser = $auth->createPermission('updateUser');
        $updateUser->description = 'Update profile information';
        $auth->add($updateUser);

        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $updateUser);

        $auth->assign($author, 5);
    }

    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }

}

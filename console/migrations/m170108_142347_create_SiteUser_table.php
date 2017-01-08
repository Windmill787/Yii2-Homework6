<?php

use yii\db\Migration;

/**
 * Handles the creation of table `SiteUser`.
 */
class m170108_142347_create_SiteUser_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('SiteUser', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'first_name' => $this->string(30)->notNull(),
            'last_name' => $this->string(30)->notNull(),
            'age' => $this->integer(3)->notNull(),
            'email' => $this->string()->notNull(),
            'password_hash' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }
    public function safeDown()
    {
        $this->dropTable('SiteUser');
    }
}

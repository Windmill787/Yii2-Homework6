<?php

use yii\db\Migration;

/**
 * Handles the creation of table `SiteUser`.
 */
class m170108_142347_create_SiteUser_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('SiteUser', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'first_name' => $this->string(30)->notNull(),
            'last_name' => $this->string(30)->notNull(),
            'age' => $this->integer(3)->notNull(),
            'email' => $this->string()->notNull(),

            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'auth_key' => $this->string(32)->notNull(),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }
    public function safeDown()
    {
        $this->dropTable('SiteUser');
    }
}

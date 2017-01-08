<?php

use yii\db\Migration;

/**
 * Handles the creation of table `test`.
 */
class m170106_215418_create_test_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('test', [
            'id' => $this->primaryKey(),
            'name' => $this->string(60),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('test');
    }
}

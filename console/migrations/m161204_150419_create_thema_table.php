<?php

use yii\db\Migration;

/**
 * Handles the creation of table `thema`.
 */
class m161204_150419_create_thema_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('thema', [
            'id' => $this->primaryKey(),
            'thema_name' => $this->string(50)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('thema');
    }
}

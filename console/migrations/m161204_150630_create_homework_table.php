<?php

use yii\db\Migration;

/**
 * Handles the creation of table `homework`.
 * Has foreign keys to the tables:
 *
 * - `thema`
 */
class m161204_150630_create_homework_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('homework', [
            'id' => $this->primaryKey(),
            'homework_name' => $this->string(70)->notNull(),
            'thema_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `thema_id`
        $this->createIndex(
            'idx-homework-thema_id',
            'homework',
            'thema_id'
        );

        // add foreign key for table `thema`
        $this->addForeignKey(
            'fk-homework-thema_id',
            'homework',
            'thema_id',
            'thema',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `thema`
        $this->dropForeignKey(
            'fk-homework-thema_id',
            'homework'
        );

        // drops index for column `thema_id`
        $this->dropIndex(
            'idx-homework-thema_id',
            'homework'
        );

        $this->dropTable('homework');
    }
}

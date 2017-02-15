<?php

use yii\db\Migration;

/**
 * Handles the creation of table `students_homework`.
 * Has foreign keys to the tables:
 *
 * - `students`
 * - `homework`
 */
class m161204_150641_create_junction_table_for_students_and_homework_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('students_homework', [
            'students_id' => $this->integer(),
            'homework_id' => $this->integer(),
            'PRIMARY KEY(students_id, homework_id)',
        ]);

        // creates index for column `students_id`
        $this->createIndex(
            'idx-students_homework-students_id',
            'students_homework',
            'students_id'
        );

        // add foreign key for table `students`
        $this->addForeignKey(
            'fk-students_homework-students_id',
            'students_homework',
            'students_id',
            'students',
            'id',
            'CASCADE'
        );

        // creates index for column `homework_id`
        $this->createIndex(
            'idx-students_homework-homework_id',
            'students_homework',
            'homework_id'
        );

        // add foreign key for table `homework`
        $this->addForeignKey(
            'fk-students_homework-homework_id',
            'students_homework',
            'homework_id',
            'homework',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `students`
        $this->dropForeignKey(
            'fk-students_homework-students_id',
            'students_homework'
        );

        // drops index for column `students_id`
        $this->dropIndex(
            'idx-students_homework-students_id',
            'students_homework'
        );

        // drops foreign key for table `homework`
        $this->dropForeignKey(
            'fk-students_homework-homework_id',
            'students_homework'
        );

        // drops index for column `homework_id`
        $this->dropIndex(
            'idx-students_homework-homework_id',
            'students_homework'
        );

        $this->dropTable('students_homework');
    }
}

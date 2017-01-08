<?php

use yii\db\Migration;

/**
 * Handles the creation of table `students`.
 * Has foreign keys to the tables:
 *
 * - `department`
 */
class m161204_150609_create_students_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('students', [
            'id' => $this->primaryKey(),
            'student_name' => $this->string(50)->notNull(),
            'department_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `department_id`
        $this->createIndex(
            'idx-students-department_id',
            'students',
            'department_id'
        );

        // add foreign key for table `department`
        $this->addForeignKey(
            'fk-students-department_id',
            'students',
            'department_id',
            'department',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `department`
        $this->dropForeignKey(
            'fk-students-department_id',
            'students'
        );

        // drops index for column `department_id`
        $this->dropIndex(
            'idx-students-department_id',
            'students'
        );

        $this->dropTable('students');
    }
}

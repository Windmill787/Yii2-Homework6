<?php

namespace common\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "students".
 *
 * @property integer $id
 * @property string $student_name
 * @property integer $department_id
 *
 * @property Department $department
 * @property StudentsHomework[] $studentsHomeworks
 * @property Homework[] $homeworks
 */
class Students extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_name', 'department_id'], 'required'],
            [['department_id'], 'integer'],
            [['student_name'], 'string', 'max' => 50],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_name' => Yii::t('app', 'Student Name'),
            'department_id' => Yii::t('app', 'Department ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentsHomeworks()
    {
        return $this->hasMany(StudentsHomework::className(), ['students_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHomeworks()
    {
        return $this->hasMany(Homework::className(), ['id' => 'homework_id'])->viaTable('students_homework', ['students_id' => 'id']);
    }
}

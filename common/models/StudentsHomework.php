<?php

namespace common\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "students_homework".
 *
 * @property integer $students_id
 * @property integer $homework_id
 *
 * @property Homework $homework
 * @property Students $students
 */
class StudentsHomework extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students_homework';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['students_id', 'homework_id'], 'required'],
            [['students_id', 'homework_id'], 'integer'],
            [['homework_id'], 'exist', 'skipOnError' => true, 'targetClass' => Homework::className(), 'targetAttribute' => ['homework_id' => 'id']],
            [['students_id'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['students_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'students_id' => Yii::t('app', 'Students ID'),
            'homework_id' => Yii::t('app', 'Homework ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHomework()
    {
        return $this->hasOne(Homework::className(), ['id' => 'homework_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasOne(Students::className(), ['id' => 'students_id']);
    }
}

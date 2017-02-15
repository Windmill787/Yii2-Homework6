<?php

namespace common\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "homework".
 *
 * @property integer $id
 * @property string $homework_name
 * @property integer $thema_id
 *
 * @property Thema $thema
 * @property StudentsHomework[] $studentsHomeworks
 * @property Students[] $students
 */
class Homework extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'homework';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['homework_name', 'thema_id'], 'required'],
            [['thema_id'], 'integer'],
            [['homework_name'], 'string', 'max' => 70],
            [['thema_id'], 'exist', 'skipOnError' => true, 'targetClass' => Thema::className(), 'targetAttribute' => ['thema_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'homework_name' => Yii::t('app', 'Homework Name'),
            'thema_id' => Yii::t('app', 'Thema ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThema()
    {
        return $this->hasOne(Thema::className(), ['id' => 'thema_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentsHomeworks()
    {
        return $this->hasMany(StudentsHomework::className(), ['homework_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['id' => 'students_id'])->viaTable('students_homework', ['homework_id' => 'id']);
    }
}

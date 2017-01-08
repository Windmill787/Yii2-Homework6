<?php

namespace common\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "thema".
 *
 * @property integer $id
 * @property string $thema_name
 *
 * @property Homework[] $homeworks
 */
class Thema extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'thema';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['thema_name'], 'required'],
            [['thema_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'thema_name' => Yii::t('app', 'Thema Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHomeworks()
    {
        return $this->hasMany(Homework::className(), ['thema_id' => 'id']);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 03.12.16
 * Time: 21:26
 */

namespace common\models;

use yii\db\ActiveRecord;

class Test extends ActiveRecord
{
    public static function tableName()
    {
        return 'students';
    }

    public static function showAll(){

        $all = Test::find()->all();
        return $all;
    }

    public static function showOne($id){
        $one = Test::findOne(['id' => $id]);
        return $one;

    }

    public static function editData($id){
        $edit = Test::find()->where([
            'id' => $id
        ])->one();
        return $edit;
    }

}
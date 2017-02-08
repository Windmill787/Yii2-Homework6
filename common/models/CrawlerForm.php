<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 25.01.17
 * Time: 16:37
 */

namespace common\models;

use yii\base\Model;
use Yii;

class CrawlerForm extends Model
{
    public $field;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['field'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'field' => Yii::t('app', 'Field'),
        ];
    }
}
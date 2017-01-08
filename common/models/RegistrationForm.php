<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 08.01.17
 * Time: 16:30
 */

namespace common\models;

use Yii;
use yii\base\Model;

class RegistrationForm extends Model
{
    public $username;
    public $email;
    public $first_name;
    public $last_name;
    public $age;
    public $password;
    public $status;

    public function rules()
    {
        return [
            [['username', 'email', 'first_name', 'last_name', 'age', 'password'],'filter', 'filter' => 'trim'],
            [['username', 'first_name', 'last_name', 'email', 'password'],'required'],
            ['username', 'string', 'min' => 2, 'max' => 20],
            ['first_name', 'string', 'min' => 2, 'max' => 30],
            ['last_name', 'string', 'min' => 2, 'max' => 30],
            ['age', 'integer', 'min' => 1, 'max' => 150],
            ['password', 'string', 'min' => 6, 'max' => 15],
            ['username', 'unique',
                'targetClass' => SiteUser::className(),
                'message' => Yii::t('app', 'This Username is already taken')],
            ['email', 'email'],
            ['email', 'unique',
                'targetClass' => SiteUser::className(),
                'message' => Yii::t('app', 'This Email is already taken')],
            ['status', 'default', 'value' => SiteUser::STATUS_ACTIVE, 'on' => 'default'],
            ['status', 'in', 'range' =>[
                SiteUser::STATUS_NOT_ACTIVE,
                SiteUser::STATUS_ACTIVE
            ]],
            ['status', 'default', 'value' => SiteUser::STATUS_NOT_ACTIVE, 'on' => 'emailActivation'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'Username'),
            'email' => Yii::t('app', 'Email'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'age' => Yii::t('app', 'Age'),
            'password' => Yii::t('app', 'Password'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
    public function registration()
    {
        $user = new SiteUser();
        $user->username = $this->username;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->age = $this->age;
        $user->email = $this->email;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
}
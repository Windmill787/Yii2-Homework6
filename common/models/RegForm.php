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

class RegForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $status;

    public function rules()
    {
        return [
            [['username', 'email', 'password'],'filter', 'filter' => 'trim'],
            [['username', 'email', 'password'],'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['password', 'string', 'min' => 6, 'max' => 255],
            ['username', 'unique',
                'targetClass' => SiteUser::className(),
                'message' => 'Это имя уже занято.'],
            ['email', 'email'],
            ['email', 'unique',
                'targetClass' => SiteUser::className(),
                'message' => 'Эта почта уже занята.'],
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
            'username' => 'Имя пользователя',
            'email' => 'Эл. почта',
            'password' => 'Пароль'
        ];
    }
    public function reg()
    {
        $user = new SiteUser();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
}
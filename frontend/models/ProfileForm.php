<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 14.01.17
 * Time: 16:11
 */

namespace frontend\models;

use Yii;
use yii\base\Model;

class ProfileForm extends Model
{
    public $username;
    public $first_name;
    public $last_name;
    public $age;
    public $img;
    public $email;

    /**
     * @var SiteUser
     */
    private $_user;

    public function __construct(SiteUser $user, $config = [])
    {
        $this->_user = $user;
        parent::__construct($config);
    }

    public function init()
    {
        $this->username = $this->_user->getUsername();
        $this->first_name = $this->_user->first_name;
        $this->last_name = $this->_user->last_name;
        $this->age = $this->_user->age;
        $this->img = $this->_user->getAvatar();
        $this->email = $this->_user->email;
        parent::init();
    }

    public function rules()
    {
        return [
            [['username', 'email', 'first_name', 'last_name', 'age'],'filter', 'filter' => 'trim'],

            ['username', 'unique', 'targetClass' => SiteUser::className(),
                'message' => Yii::t('app', 'This Username is already taken')],
            ['username', 'string', 'min' => 2, 'max' => 20],

            ['first_name', 'string', 'min' => 2, 'max' => 30],
            ['last_name', 'string', 'min' => 2, 'max' => 30],
            ['age', 'integer', 'min' => 1, 'max' => 150],

            ['img', 'file'],

            ['email', 'unique', 'targetClass' => SiteUser::className(),
                'message' => Yii::t('app', 'This Email is already used')],
            ['email', 'email']
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'Username'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'age' => Yii::t('app', 'Age'),
            'img' => Yii::t('app', 'Image'),
            'email' => Yii::t('app', 'Email')
        ];
    }

    public function update()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = $this->_user;
        $user->username = $this->username;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->age = $this->age;
        $user->img = $this->img;
        $user->email = $this->email;

        return $user->save() ? $user : null;
    }

}
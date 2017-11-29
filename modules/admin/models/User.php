<?php


namespace app\modules\admin\models;
use app\modules\admin\models\UserIdentify;
use yii\base\Model;
use Yii;


class User extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;
    private $_user = false;


    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить',
        ];
    }

    public function rules()
    {
        return [
            [['username', 'password'], 'required', 'message'=>'Не заполнено обязательное поле'],
            ['rememberMe', 'boolean'],
            ['password', 'checkPassword'],
        ];
    }


    public function checkPassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Некоректный логин или пароль.');
            }
        }
    }


    public function login()
    {
        if ($this->validate()) {

            if ($this->rememberMe) {
                $u = $this->getUser();
                $u->generateAuthKey();
                $u->save();
            }

            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;
    }





    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = UserIdentify::findByUsername($this->username);
        }

        return $this->_user;
    }




}
<?php

namespace app\modules\admin\models;
use yii\db\ActiveRecord;
use Yii;

class UserIdentify extends ActiveRecord implements \yii\web\IdentityInterface
{


    static function tableName(){
        return 'user';
    }

    
    
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

   
    public static function findIdentityByAccessToken($token, $type = null)
    {
        //return static::findOne($id);
    }

    
    public static  function findByUsername($username)
    {
        return static::findOne(["username"=>$username]);
    }

    
    public function getId()
    {
        return $this->id;
    }

   
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

   
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }

    public function generateAuthKey(){
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

}

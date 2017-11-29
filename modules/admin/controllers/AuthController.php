<?php
/**
 * Created by PhpStorm.
 * User: Shnappi
 * Date: 06.11.2016
 * Time: 0:17
 */

namespace app\modules\admin\controllers;
use app\modules\admin\models\User;
use Yii;

class AuthController extends AppAdminController
{

 public function  actionLogin()
 {
     $model=new User;
     if ($model->load(Yii::$app->request->post()) && $model->login()) {
         return $this->goBack();
     }
     $this->view->title = "Вход";
     return $this->render("login", compact("model"));

} 

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }


}
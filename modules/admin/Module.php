<?php

namespace app\modules\admin;
use Yii;

class Module extends \yii\base\Module
{

    public $controllerNamespace = 'app\modules\admin\controllers';


    public function init()
    {
        parent::init();
        Yii::$app->set('user', [
            'class' => 'yii\Web\User',
            'identityClass'  => 'app\modules\admin\models\UserIdentify',
            'enableAutoLogin' => true,
            'loginUrl' => ['admin/auth/login'],
       ]);

    }
}


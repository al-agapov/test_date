<?php
/**
 * Created by PhpStorm.
 * User: Shnappi
 * Date: 05.11.2016
 * Time: 20:42
 */

namespace app\modules\admin\controllers;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\modules\admin\models;



class AppAdminController extends Controller
{

    public function behaviors()
    {
        return ['access' => [
        'class' => AccessControl::className(),
        'rules' =>[
            [
                'actions' => [ 'login' ],
                'allow'   => true,
                'roles'   => [ '?' ],
            ],

            [
                    'actions' => ['index', 'logout', 'view', 'update' , 'delete'],
                    'allow' => true,
                    'roles' => ['admin'],
            ],

            [
                'actions' => ['index', 'logout', 'view', 'update'],
                'allow' => true,
                'roles' => ['user'],

            ],
        ]
    ]
    ];
    }
     
    
    
    
    
}
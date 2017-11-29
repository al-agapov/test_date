<?php
/**
 * Created by PhpStorm.
 * User: Shnappi
 * Date: 27.11.2017
 * Time: 17:59
 */

namespace app\controllers;

use app\models\HistoricalEvent;
use Yii;

class MainController extends AppController
{

    public function actionIndex(){

        $model= new HistoricalEvent();
        $model->user_ip=$_SERVER["REMOTE_ADDR"];

        if(Yii::$app->request->post()){
            if($model->load(Yii::$app->request->post())){
                if($model->validate()){
                    $model->save();
                    Yii::$app->session->setFlash('success');
                    return $this->refresh();
                }else{
                    Yii::$app->session->setFlash('error');
                }
            }
        }

        $this->view->title = "Добавить историческое событие";

        return $this->render('index', compact('model'));

    }



    public function actions()
    {
        return [
            'error' => [
               'class' => 'yii\web\ErrorAction'
            ],

        ];
    }


    public function beforeAction($action)
    {
        if ($action->id == 'error') {
            $this->layout = 'error';
        }
        return parent::beforeAction($action);

    }

}

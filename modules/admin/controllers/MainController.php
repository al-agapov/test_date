<?php

namespace app\modules\admin\controllers;


use yii\data\ActiveDataProvider;
use app\modules\admin\models\HistoricalEvent;
use Yii;



class MainController extends AppAdminController
{

    public function actionIndex()
    {

        $search_model = new HistoricalEvent;

        $this->view->title = "Панель управления";

        $data_provider = $search_model ->search(Yii::$app->request->get());

        return $this->render('index', compact('model','data_provider', 'search_model'));
    }


    public function actionView($id)
    {
        $historical_event=HistoricalEvent::findOne($id);

        $this->view->title = "Панель управления | просмотр события №".$historical_event->id;

        return $this->render('view', compact('historical_event'));
    }


    public function actionUpdate($id)
    {
        $historical_event = HistoricalEvent::findOne($id);

        $this->view->title = "Панель управления | редактирование событие №" . $historical_event->id;


        if ($historical_event->load(Yii::$app->request->post())) {

            if ($historical_event->save()) {

                Yii::$app->session->setFlash('success', 'Собятие отредактировано');

                $historical_event = HistoricalEvent::findOne($id);

            } else {

                Yii::$app->session->setFlash('error', 'Ошибка, не удалось отредактировать событие');

            }
        }
        return $this->render('update', compact('historical_event'));
    }


    public function actionDelete($id)
    {

        HistoricalEvent::findOne($id)->delete();

        return $this->redirect(['index']);
    }
  

}


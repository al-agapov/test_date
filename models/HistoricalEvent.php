<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


class HistoricalEvent extends ActiveRecord
{


    static function tableName(){
        return 'historical_event';
    }



    public function rules()
    {
        return [
            [['date', 'description'], 'required', 'message'=>'Не заполнено обязательное поле'],
            ['description', 'trim'],
            [['date'], 'date', 'format' => 'yyyy-MM-dd', 'message'=>'Формат даты неверный'],
        ];
    }


    public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date_insert'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

}
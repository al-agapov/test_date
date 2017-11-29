<?php


namespace app\modules\admin\models;

use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;
use yii\base\Model;

class HistoricalEvent extends ActiveRecord
{
    public $date_from;
    public $date_to;
    public $search_str;

    static function tableName(){
        return 'historical_event';
    }


    public function rules()
    {
        return [
            [['date_to', 'date_from', 'date'], 'date', 'format' => 'yyyy-MM-dd', 'message'=>'Формат даты неверный'],
            [['date_to', 'date_from', 'search_str' , 'date', 'description'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return array(

            'date_insert' => 'Дата Добавления',
            'user_ip' => 'IP пользователя',
            'date' => 'Дата события',
            'description' => 'Событие',

        );
    }


    public function scenarios()
  {
      return Model::scenarios();

    }


    public function search($params)
    {
        $query = HistoricalEvent::find();

        $data_provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10
            ],
            'sort' => [
                'defaultOrder' => [
                    'date_insert' => SORT_DESC
                ]
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $data_provider;
        }


        if(empty($this->date_from)){
            $min=HistoricalEvent::find()->select("date")->orderBy(['date' => SORT_ASC])->one();
            $this->date_from=$min->date;
        }

        if(empty($this->date_to)){
            $max=HistoricalEvent::find()->select("date")->orderBy(['date' => SORT_DESC])->one();
            $this->date_to=$max->date;
        }

        $query->andFilterWhere(['BETWEEN', 'date', $this->date_from, $this->date_to]);


        if(!empty($this->search_str)){
            $query->andFilterWhere(['LIKE', 'description',\app\components\Words::getWord($this->search_str )]);
        }

        return $data_provider;

    }



}
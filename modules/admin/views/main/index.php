<?php

use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\helpers\StringHelper;
?>

<h1>Список исторических событий</h1>
<? $form = ActiveForm::begin(['id' => 'historical_form', 'method'=>'get']); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">

                <?= $form->field($search_model, 'date_from')->widget(DatePicker::classname(), [
                    'language' => 'ru',
                    'options' => ['class' => 'form-control'],
                    'dateFormat' => 'yyyy-MM-dd'])->label("с");?>

            </div>
            <div class="col-md-3">

                <?= $form->field($search_model, 'date_to')->widget(DatePicker::classname(), [
                    'language' => 'ru',
                    'options' => ['class' => 'form-control'],
                    'dateFormat' => 'yyyy-MM-dd'])->label("до"); ?>

            </div>
            <div class="col-md-3">

                <?= $form->field($search_model, 'search_str')->label('поиск');?>

            </div>
            <div class="col-md-2 btn-wrap">

                <?= Html::submitButton('Выбрать',  ['class' => 'btn btn-primary']); ?>

            </div>
        </div>
    </div>

<? ActiveForm::end(); ?>



<? if (Yii::$app->user->can('delete')){

echo GridView::widget([
    'dataProvider' => $data_provider,
    'filterModel' => $search_model,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'date_insert',
        'user_ip',
        'date',
        [
            'attribute'=>'description',
            'format' => 'raw',
            'headerOptions' => ['width' => '500'],
            'value'    => function($search_model){
                  return strip_tags (StringHelper::truncate($search_model->description, 150));
            },

        ],

        [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'<span class="glyphicon glyphicon-cog"></span>',
            'headerOptions' => ['width' => '75'],
            'template' => '{view} {update} {delete}{link}',
        ],
    ],
]);

}else{

    echo GridView::widget([
        'dataProvider' => $data_provider,
        'filterModel' => $search_model,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'date_insert',
            'user_ip',
            'date',
            [
                'attribute'=>'description',
                'format' => 'raw',
                'headerOptions' => ['width' => '500'],
                'value'    => function($search_model){
                    return strip_tags (StringHelper::truncate($search_model->description, 150));
                },

            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'<span class="glyphicon glyphicon-cog"></span>',
                'headerOptions' => ['width' => '55'],
                'template' => '{view} {update} {link}',
            ],
        ],
    ]);

}

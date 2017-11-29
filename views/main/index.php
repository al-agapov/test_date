<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\jui\DatePicker;



?>
    <div class="row">
        <div class="col-md-8  col-md-offset-2">

            <h1>Добавить историческое событие</h1>

        </div>
    </div>

    <div class="row">
        <div class="col-md-8  col-md-offset-2">

            <? $form = ActiveForm::begin(['id' => 'historical_form']); ?>

            <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
                'language' => 'ru',
                'dateFormat' => 'yyyy-MM-dd',
                'options' => ['class' => 'form-control'],
            ])->label('Дата'); ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 5])->label('Историческое событие');?>


            <?= Html::submitButton('Сохранить',  ['class' => 'btn btn-primary']); ?>



            <? ActiveForm::end(); ?>

            <div class="alert-wrap">
            <? if( Yii::$app->session->hasFlash('success') ): ?>
                <div class="alert alert-success alert-dismissible"  role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p>Данные сохранены</p>
                </div>
            <? endif;?>

            <? if( Yii::$app->session->hasFlash('error') ): ?>
                <div class="alert alert-danger alert-dismissible"  role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p>Ошибка, данные не сохранены</p>
                </div>
            <? endif;?>

         </div>
        </div>
    </div>

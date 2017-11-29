<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use mihaildev\ckeditor\CKEditor;

?>

<div class="col-md-8  col-md-offset-2">
    <h1>Редактирование события №<?= $historical_event->id ?></h1>

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($historical_event, 'date')->widget(DatePicker::classname(), [
            'language' => 'ru',
            'dateFormat' => 'yyyy-MM-dd',
            'options' => ['class' => 'form-control'],
        ]); ?>

        <?= $form->field($historical_event, 'description')->widget(CKEditor::className(),[
            'editorOptions' => [
                'options' => ['rows' => 3],
                'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                'inline' => false, //по умолчанию false
                'allowedContent'=>true,
            ],
        ]);
        ?>

        <?= Html::submitButton("Cохранить", ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end(); ?>



    <div class="alert-wrap">
        <? if( Yii::$app->session->hasFlash('success') ): ?>
            <div class="alert alert-success alert-dismissible"  role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?= Yii::$app->session->getFlash('success'); ?>
            </div>
        <? endif;?>
        <? if( Yii::$app->session->hasFlash('error') ): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?= Yii::$app->session->getFlash('error'); ?>
            </div>
        <? endif;?>
    </div>

</div>
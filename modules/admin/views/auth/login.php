<?
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<div class="container">
    <div class="row">
        <div class="col-md-4  col-md-offset-4">
            <h2>Вход</h2>
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

    <?= $form->field($model, 'username')->textInput() ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'rememberMe')->checkbox([
        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ]) ?>

    <?= Html::submitButton('Вход', ['class' => 'btn btn-primary', 'name' => 'login-button', 'style'=>'margin-top:0; padding:6px 29px;']) ?>

    <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\adminAppAsset;

adminAppAsset::register($this);

?>
<!DOCTYPE html>
<?php $this->beginPage() ?>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head><!--/head-->
<body>
<?php $this->beginBody() ?>

<?php if(!Yii::$app->user->isGuest): ?>
    <nav class="navbar-inverse navbar-static-top navbar">
     <div class="container">
         <div class="navbar-header"><a class="navbar-brand" href="/admin">Исторические события</a></div>

<ul class="navbar-nav navbar-right nav">
    <li><a href="<?= Url::to(['/admin/auth/logout'])?>"><?= Yii::$app->user->identity['username']?> (Выход)</a></li>
    </ul>
    </div>
    </nav>
<?php endif;?>

<div class="container">
    
<?= $content; ?>
</div>

<?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
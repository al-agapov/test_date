<?
use yii\widgets\DetailView;
?>


<div class="col-md-8  col-md-offset-2">
    <h1>Просмотр события №<?=$historical_event->id;?></h1>
<?= DetailView::widget([
    'model' => $historical_event,
    'attributes' => [
        'id',
        'user_ip',
        'date_insert',
        'date',
         [
            'attribute'=>'description',
             'format' => 'html',
         ],

    ],
]) ?>
</div>


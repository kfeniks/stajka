<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<div class="span10 txt">
        <div class="title"><img src="/web/files/<?= Html::encode($model->img) ?>" style="width: 500px; height: 300px;" alt="<?= Html::encode($model->title) ?>" /></div>
        <div class="date"><?=  HtmlPurifier::process(Yii::$app->formatter->asDate($model->date, 'd MMMM yyyy')) ?></div>


</div>

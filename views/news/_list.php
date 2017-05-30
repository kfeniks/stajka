<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<div class="span10 txt">
    <?php if($model->date_up == null){ ?>
    <div class="date"><?=  HtmlPurifier::process(Yii::$app->formatter->asDate($model->date, 'd MMMM yyyy')) ?></div>
    <?php } else { ?>
    <div class="date"><?=  HtmlPurifier::process(Yii::$app->formatter->asDate($model->date_up, 'd MMMM yyyy')) ?></div>
    <?php } ?>
    <div class="title"><a href="<?=Yii::$app->urlManager->createUrl(["news/view", "id" => $model->id])?>" title="<?= Html::encode($model->title) ?>"><?= Html::encode($model->title) ?></a></div>
    <div class="text">

    </div>
</div>

<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
$this->title = Html::encode($model->title);
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <?=  HtmlPurifier::process($model->text) ?>
    <p><b>Дата:</b> <?php if($model->date_up == null){ ?>
        <?=  HtmlPurifier::process(Yii::$app->formatter->asDate($model->date, 'd MMMM yyyy')) ?>
    <?php } else { ?>
        <?=  HtmlPurifier::process(Yii::$app->formatter->asDate($model->date_up, 'd MMMM yyyy')) ?>
    <?php } ?></p>
    <p><b>Просмотров:</b> <?=  Html::encode($model->hits) ?></p>
</div>

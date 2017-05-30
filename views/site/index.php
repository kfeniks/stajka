<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;
use yii\helpers\Html;
$this->title = 'Стяжка стен и ремонт';
?>

<div class="block1">
    <div class="row">
        <div class="span9">
            <?= HtmlPurifier::process($model->index_block) ?>
        </div>
        <div class="span5">
            <div style="margin-top: 20px;">
                <iframe width="382" height="215" src="//www.youtube.com/embed/<?=  Html::encode($model->index_video) ?>?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
<div class="block2">
    <h3>Как мы работаем?</h3>
    <div class="e">
        <img src="web/images/img-01.png" alt="" />
        <a href="<?= Url::to(['site/step1']); ?>" class="title">Шаг первый</a>
        <p><?=  Html::encode($model->index_step1) ?></p>
    </div>
    <div class="e">
        <img src="web/images/img-02.png" alt="" />
        <a href="<?= Url::to(['site/step2']); ?>" class="title">Шаг второй</a>
        <p><?=  Html::encode($model->index_step2) ?></p>
    </div>
    <div class="e">
        <img src="web/images/img-03.png" alt="" />
        <a href="<?= Url::to(['site/step3']); ?>" class="title">Шаг третий</a>
        <p><?=  Html::encode($model->index_step3) ?></p>
    </div>
    <div class="e">
        <img src="web/images/img-04.png" alt="" />
        <a href="<?= Url::to(['site/step4']); ?>" class="title">Шаг четвертый</a>
        <p><?=  Html::encode($model->index_step4) ?></p>
    </div>
</div>




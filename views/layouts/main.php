<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\components\Alert;
use app\components\IndexWidget;
use app\components\ModalWidget;
use app\components\ModaltimeWidget;
AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <meta name="viewport" content="width=1100">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body style="height: 100%;">
<?php $this->beginBody() ?>
<div style="min-height: 100%;" >
<div class="main" >
    <header>
        <div class="logo"><a href="/"><img src="/web/images/logo.png" alt="" /></a></div>
        <div class="twentyyears"><?= IndexWidget::widget(['a' => '1']); ?></div>
        <div class="phone"><?= IndexWidget::widget(['a' => '2']); ?></div>
        <div class="button">
            <a data-toggle="modal" data-target="#call_me_modal" href="#call_me_modal">Заказать звонок</a>
        <a data-toggle="modal" data-target="#zakazat-zamer_modal" href="#zakazat-zamer_modal">Бесплатный замер</a>
        </div>
    </header>
</div>
<nav>

    <ul>
        <li class="first"><a href="<?= Url::to(['site/index']); ?>" title="Главная" >Главная</a></li>
        <li><a href="<?= Url::to(['site/about']); ?>" title="О компании" >О компании</a></li>
        <li><a href="<?= Url::to(['site/remont']); ?>" title="Наши работы" >Наши работы</a></li>
        <li><a href="<?= Url::to(['news/index']); ?>" title="Новости" >Новости</a></li>
        <li class="last"><a href="<?= Url::to(['site/contact']); ?>" title="Контакты" >Контакты</a></li>
            <?php if (!Yii::$app->user->isGuest) {?>
                <?php
                echo '<li class="last">'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Выйти',
                        ['class' => '']
                    )
                    . Html::endForm()
                    . '</li>';
             } ?>

    </ul>

</nav> <?php // Yii::$app->request->url == Yii::$app->homeUrl ?>
    <?php if ((Yii::$app->controller->id == 'site') and (Yii::$app->controller->action->id == 'index'))  { ?>
        <section class="banner">
            <ul class="banner-slider">
                <li><a class="slide" href="<?= Url::to(['site/news']); ?>" target="_blank"><img src="web/images/slider/slide20.jpg"></a></li>
                <li><a class="slide" href="<?= Url::to(['okna/seria-evolution']); ?>" target="_blank"><img src="web/images/slider/slide3v2.jpg"></a></li>
                <li><a class="slide" href="<?= Url::to(['okna/seria-home']); ?>" target="_blank"><img src="web/images/slider/slide1v2.jpg"></a></li>
                <li><a class="slide" href="<?= Url::to(['okna/seria-city']); ?>" target="_blank"><img src="web/images/slider/slide2v2.jpg"></a></li>
            </ul>
        </section>
    <?php } ?>
<div class="container">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?= $content ?>
</div>
</div>
<footer style="left: 0;
  bottom: 0;
  width: 100%;">
    <div class="container">
        <div class="row">
            <div class="span3">

            </div>
            <div class="span3">
                <ul class="menu">
                    <li><a href="<?= Url::to(['site/index']); ?>">Главная</a></li>
                    <li><a href="<?= Url::to(['site/about']); ?>">О компании</a></li>
                    <li><a href="<?= Url::to(['site/remont']); ?>">Наши работы</a></li>
                    <li><a href="<?= Url::to(['site/contact']); ?>">Контакты</a></li>
                    <li><a href="<?= Url::to(['news/index']); ?>">Новости</a></li>
                </ul>
            </div>
            <div class="span3">
                <ul class="menu">
                    <li><a data-toggle="modal" data-target="#zakazat-zamer_modal" href="#zakazat-zamer_modal">Записаться на замер</a></li>
            <li><a  data-toggle="modal" data-target="#call_me_modal" href="#call_me_modal">Заказать обратный звонок</a></li>
        </ul>
    </div>
    <div class="span5 fcontacts">
        <div style="margin-left: 40px;"><?= IndexWidget::widget(['a' => '3']); ?>
            <table>
                <tr><td><p>Мы в соц. сетях:</p></td>
                    <td>

                        <a href="https://vk.com/<?= IndexWidget::widget(['a' => '4']); ?>" target="_blank" rel="nofollow"><img src="/web/images/soc-vk.png" alt="" /></a>

                        <a href="https://www.youtube.com/<?= IndexWidget::widget(['a' => '5']); ?>" target="_blank" rel="nofollow"><img src="/web/images/soc-youtube.png" alt="" /></a>

                    </td></tr>
            </table>
        </div>
    </div>
    </div>
    </div>
    <div class="container foot">
        <p>© 2015-<?= date('Y') ?> ООО «Ремонт», Донецк. Все права защищены. Сделано в <a href="http://keccgroup.ru" target="_blank">KECCGROUP.RU</a></p>
    </div>
</footer>

<?= ModalWidget::widget(); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

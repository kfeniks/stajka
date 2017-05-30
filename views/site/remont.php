<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = 'Наши работы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= ListView::widget([
        'dataProvider' => $listDataProvider,
        'itemView' => '_list',
        'layout'=>"{summary}\n{items}",

        'pager' => [
            'firstPageLabel' => 'Первая',
            'lastPageLabel' => 'Последняя',
            'nextPageLabel' => '>>',
            'prevPageLabel' => '<<',
            'maxButtonCount' => 5,
        ],

        'options' => [
            'tag' => 'div',
            'class' => 'row',
            'id' => 'news-list',],
        'itemOptions' => [
            'tag' => 'div',
            'class' => 'col-xs-6 p',
        ],
        'emptyText' => 'Список новостей пуст',
        'summary' => ''
    ]);
    ?>
    <?= \yii\widgets\LinkPager::widget([
        'pagination'=>$listDataProvider->pagination,
    ]);?>

</div>

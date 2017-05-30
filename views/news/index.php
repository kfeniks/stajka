<?php

use yii\widgets\ListView;
$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= ListView::widget([
        'dataProvider' => $listDataProvider,
        'itemView' => '_list',

        'pager' => [
            'firstPageLabel' => 'Первая',
            'lastPageLabel' => 'Последняя',
            'nextPageLabel' => '>>',
            'prevPageLabel' => '<<',
            'maxButtonCount' => 5,
        ],

        'options' => [
            'tag' => 'div',
            'class' => 'content',
            'id' => 'news-list',],
        'itemOptions' => [
            'tag' => 'div',
            'class' => 'row news',
        ],
        'emptyText' => 'Список новостей пуст',
    ]);
    ?>


<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use kartik\date\DatePicker;
use kartik\time\TimePicker;
?>

<div id="zakazat-zamer_modal" class="modalDialog2">
    <div style="padding-top: 15px">
        <a href="#close" title="Закрыть" class="close">X</a>
        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

        <?= $form->field($model2, 'name')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model2, 'phone') ?>
        <?php
        echo DatePicker::widget([
            'model' => $model2,
            'form' => $form,
            'attribute' => 'date',
            'type' => DatePicker::TYPE_COMPONENT_PREPEND,

            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);
        ?>

        <?=$form->field($model2, 'time')->widget(TimePicker::classname(), [
            'pluginOptions' => [
                'autoclose'=>true,
                'showSeconds' => true,
                'showMeridian' => false,
                'minuteStep' => 1,
                'secondStep' => 5,
                'defaultTime' => '0:00:00',

            ]]);?>

        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
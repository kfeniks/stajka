<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

    <div id="call_me_modal" class="modalDialog">
        <div style="padding-top: 15px">
            <a href="#close" title="Закрыть" class="close">X</a>
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'phone') ?>

            <div class="form-group">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
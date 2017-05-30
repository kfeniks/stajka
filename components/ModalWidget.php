<?php

namespace app\components;

use yii\base\Widget;
use app\models\ModalForm;
use Yii;

class ModalWidget extends Widget
{
    public $a;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        if($this->a === null){$this->a = 0;}
    }
    public function run()
    {
        if($this->a == 0){
            return $text = 'Ошибка';
        }

        if($this->a == 1){
            $model = new ModalForm();
            if ($model->load(Yii::$app->request->post()) && $model->sendEmail()) {
                Yii::$app->session->setFlash('contactFormSubmitted');
                $name = $model->name;
                return $this->render('sended', [
                    'name' => $name,
                ]);
            }
            return $this->render('modal', [
                'model' => $model,
            ]);
        }

        return $text = 'Ошибка';
    }
}
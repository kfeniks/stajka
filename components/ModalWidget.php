<?php

namespace app\components;

use yii\base\Widget;
use app\models\ModalForm;
use app\models\Modal2Form;
use Yii;

class ModalWidget extends Widget
{
    public function run()
    {
            $model = new ModalForm();
            $model2 = new Modal2Form();
            if ($model->load(Yii::$app->request->post()) && $model->sendEmail()) {
                Yii::$app->session->setFlash('contactFormSubmitted');
                $name = $model->name;
                return $this->render('sended', [
                    'name' => $name,
                ]);
            }
        if ($model2->load(Yii::$app->request->post()) && $model2->sendEmail()) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            $name = $model2->name;
            return $this->render('sended', [
                'name' => $name,
            ]);
        }
            return $this->render('modal', [
                'model' => $model,
                'model2' => $model2,
            ]);
    }
}
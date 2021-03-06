<?php

namespace app\components;

use yii\base\Widget;
use app\models\Modal2Form;
use Yii;

class ModaltimeWidget extends Widget
{


    public function run()
    {
            $model2 = new Modal2Form();
            if ($model2->load(Yii::$app->request->post()) && $model2->sendEmail()) {
                Yii::$app->session->setFlash('contactFormSubmitted');
                $name = $model2->name;
                return $this->render('sended', [
                    'name' => $name,
                ]);
            }
            return $this->render('modaltime', [
                'model2' => $model2,
            ]);
    }
}
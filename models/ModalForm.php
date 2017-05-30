<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ModalForm extends Model
{
    public $name;
    public $phone;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'phone'], 'required'],
            ['phone', 'match', 'pattern' => '/^\+38\s\([0-9]{3}\)\s[0-9]{3}\-[0-9]{2}\-[0-9]{2}$/', 'message' => 'Формат должен быть такой +38 (000) 000-00-00' ],
            //['email', 'unique', 'targetClass' => '\app\models\Email', 'message' => 'This emeil is already registered.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Ваше имя',
            'phone' => 'Ваше номер',
        ];
    }

    public function sendEmail()
    {
        $subject = 'Обратный звонок';
        $news = Yii::$app->request->url;
        $body = '
             Письмо на сайте Стяжка стен             
             Здравствуй, админ! Тебе пришло письмо с сайта.
             Тема: Заказать обратный звонок.
             Имя: '.$this->name.'
             Телефон: '.$this->phone.'
             Страница: '.$news.'
                                    
        ';
        return Yii::$app->mailer->compose()
            ->setTo([Yii::$app->params['followEmail'] => 'Oleg'])
            ->setFrom([Yii::$app->params['supportEmail'] => 'My site'])
            ->setSubject($subject)
            ->setTextBody($body)
            ->send();
    }
}

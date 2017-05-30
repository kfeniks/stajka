<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Modal2Form extends Model
{
    public $name;
    public $phone;
    public $date;
    public $time;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            [['date', 'time'], 'safe'],
            ['phone', 'match', 'pattern' => '/^\+38\s\([0-9]{3}\)\s[0-9]{3}\-[0-9]{2}\-[0-9]{2}$/', 'message' => 'Формат должен быть такой +38 (000) 000-00-00' ],
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
            'date' => 'Желаемый день',
            'time' => 'Время',
        ];
    }

    public function sendEmail()
    {
        $subject = 'Бесплатный замер';
        $news = Yii::$app->request->url;
        $body = '
             Письмо на сайте Стяжка стен             
             Здравствуй, админ! Тебе пришло письмо с сайта.
             Тема: Заказать бесплатный замер.
             Имя: '.$this->name.'
             Телефон: '.$this->phone.'
             День: '.Yii::$app->formatter->asDate($this->date, 'd MMMM yyyy').'
             Время: '.Yii::$app->formatter->asTime($this->time, 'mm:ss').'
             Страница: '.$news.'
                                    
        ';
        return Yii::$app->mailer->compose()
            ->setTo([Yii::$app->params['followEmail'] => 'Мой адрес'])
            ->setFrom([Yii::$app->params['supportEmail'] => 'My site'])
            ->setSubject($subject)
            ->setTextBody($body)
            ->send();
    }
}

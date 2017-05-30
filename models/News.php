<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;
use yii\helpers\HtmlPurifier;
use app\components\FollowusWidget;

/**
 * Posts is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class News extends ActiveRecord
{
    const STATUS_PENDING=0;
    const STATUS_APPROVED=1;

    /**
     * @return array the validation rules.
     */

    public $fileImage;

    public function rules()
    {
        return [
            [['title', 'text', 'img'], 'required'],
            [['date_up', 'date'], 'safe'],
            [['hits', 'hide'], 'integer'],
            [['title'], 'string', 'max' => 150],
            [['fileImage'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'maxSize'=>1024 * 1024 * 1],
        ];
    }


    public static function tableName()
    {
        return '{{%news}}';
    }
    public function attributeLabels()
    {
        return [
            'hide' => 'Опубликовано',
            'hits' => 'Просмотров',
            'title' => 'Название',
            'text' => 'Текст',
            'date' => 'Дата',
            'date_up' => 'Обновлено',
            'fileImage' => 'Основное изображение',
            'img' => 'Основное изображение',
        ];
    }

    public function getTextTitle()
    {
        return $text = mb_substr(HtmlPurifier::process($this->title), 0, 100);
    }
    public function getNameStatus(){
        if($this->hide == self::STATUS_APPROVED){return $nameStatus = 'Да';}
        else{return $nameStatus = 'Нет';}
    }

}

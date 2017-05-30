<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;
use yii\helpers\HtmlPurifier;

/**
 * Posts is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class Work extends ActiveRecord
{

    /**
     * @return array the validation rules.
     */

    public $fileImage;

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['date'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['fileImage'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'maxSize'=>1024 * 1024 * 1],
        ];
    }


    public static function tableName()
    {
        return '{{%work}}';
    }
    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'date' => 'Дата',
            'date_up' => 'Обновлено',
            'fileImage' => 'Основное изображение',
            'img' => 'Основное изображение',
        ];
    }

}

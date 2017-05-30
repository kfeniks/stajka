<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\HtmlPurifier;

/**
 * Posts is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class Content extends ActiveRecord
{
    const STATUS_PENDING=0;
    const STATUS_APPROVED=1;
    /**
     * @return array the validation rules.
     */

    public function rules()
    {
        return [
            [['about', 'contact_form', 'step1', 'step2', 'step3', 'step4', 'footer_social_vk',
            'footer_social_youtube', 'footer_contact'], 'required'],
            [['index_hits', 'about_hits', 'contact_hits', 'step1_hits', 'step2_hits', 'step3_hits',
                'step4_hits', 'remont_hits', 'contact_form'], 'integer'],
            [['header_block', 'header_block_tel', 'index_block', 'index_video', 'index_step1', 'index_step2', 'index_step3',
                'index_step4', 'footer_social_vk', 'footer_social_youtube', 'footer_contact'], 'string', 'max' => 255],

        ];
    }


    public static function tableName()
    {
        return '{{%content}}';
    }
    public function attributeLabels()
    {
        return [
            'about' => 'Страница О нас',

        ];
    }

    public function getTextTitle()
    {
        return $text = mb_substr(HtmlPurifier::process($this->about), 0, 100);
    }
    public function getNameStatus(){
        if($this->contact_form == self::STATUS_APPROVED){return $nameStatus = 'Да';}
        else{return $nameStatus = 'Нет';}
    }

}

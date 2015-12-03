<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%ank_answvariants}}".
 *
 * @property integer $id_av
 * @property integer $id_q
 * @property integer $npp
 * @property integer $isHidden
 * @property integer $hasText
 * @property integer $textMaxLength
 * @property integer $isNoRandomized
 * @property string $separator
 * @property string $name_ua
 * @property string $name_ru
 */
class QuestionAnswer extends ActiveRecord
{
    const IS_HIDDEN_TRUE = 1;
    const IS_HIDDEN_FALSE = 0;

    const HAS_TEXT_TRUE = 1;
    const HAS_TEXT_FALSE = 0;

    const IS_NO_RANDOMIZED_TRUE = 1;
    const IS_NO_RANDOMIZED_FALSE = 0;

    public static function tableName()
    {
        return '{{%ank_answvariants}}';
    }

    public function rules()
    {
        return [
            [['name_ua', 'name_ru', 'npp', 'isHidden', 'hasText', 'textMaxLength', 'isNoRandomized'], 'required'],
            [['id_q', 'npp', 'isHidden', 'hasText', 'textMaxLength', 'isNoRandomized'], 'integer'],
            [['separator'], 'string', 'max' => 15],
            [['name_ua', 'name_ru'], 'string', 'max' => 255]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id_av' => Yii::t('app', 'ID'),
            'id_q' => Yii::t('app', 'Question'),
            'npp' => Yii::t('app', 'Serial Number'),
            'isHidden' => Yii::t('app', 'Is Hidden'),
            'hasText' => Yii::t('app', 'Has Text'),
            'textMaxLength' => Yii::t('app', 'Text Length [max]'),
            'isNoRandomized' => Yii::t('app', 'Is Randomized'),
            'separator' => Yii::t('app', 'Separator'),
            'name_ua' => Yii::t('app', 'Name [UA]'),
            'name_ru' => Yii::t('app', 'Name [RU]'),
        ];
    }

    public function init()
    {
        if ($this->isNewRecord) {
            $this->npp = 0;
            $this->textMaxLength = 100;
        }
        parent::init();
    }

    public function getIsHidden()
    {
        switch ($this->isHidden) {
            case static::IS_HIDDEN_TRUE: {
                return Yii::t('app', 'Yes');
            }
            case static::IS_HIDDEN_FALSE: {
                return Yii::t('app', 'No');
            }
            default: {
                return null;
            }
        }
    }

    public function getIsNoRandomized()
    {
        switch ($this->isHidden) {
            case static::IS_NO_RANDOMIZED_TRUE: {
                return Yii::t('app', 'Yes');
            }
            case static::IS_NO_RANDOMIZED_FALSE: {
                return Yii::t('app', 'No');
            }
            default: {
                return null;
            }
        }
    }

    public function getHasText()
    {
        switch ($this->isHidden) {
            case static::HAS_TEXT_TRUE: {
                return Yii::t('app', 'Yes');
            }
            case static::HAS_TEXT_FALSE: {
                return Yii::t('app', 'No');
            }
            default: {
                return null;
            }
        }
    }

    /*----------------------------------------------------------------------------------------------------------------*/

    public static function getIsHiddenOptions()
    {
        return [
            static::IS_HIDDEN_TRUE => Yii::t('app', 'Yes'),
            static::IS_HIDDEN_FALSE => Yii::t('app', 'No'),
        ];
    }

    public static function getHasTextOptions()
    {
        return [
            static::HAS_TEXT_TRUE => Yii::t('app', 'Yes'),
            static::HAS_TEXT_FALSE => Yii::t('app', 'No'),
        ];
    }

    public static function getIsNoRandomizedOptions()
    {
        return [
            static::IS_NO_RANDOMIZED_TRUE => Yii::t('app', 'Yes'),
            static::IS_NO_RANDOMIZED_FALSE => Yii::t('app', 'No'),
        ];
    }
}

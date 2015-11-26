<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%ank_questions}}".
 *
 * @property integer $id_q
 * @property integer $id_ank
 * @property integer $npp
 * @property string $name_ua
 * @property string $name_ru
 * @property integer $q_type
 * @property integer $answ_min
 * @property integer $answ_max
 * @property integer $isRandom
 * @property integer $bbPresent
 * @property integer $ivPresent
 * @property integer $openQuestionAnswerMaxLength
 *
 * @property Questionnaire $questionnaire
 */
class Question extends ActiveRecord
{
    const Q_TYPE_CLOSE = 1;
    const Q_TYPE_OPEN = 2;
    const Q_TYPE_SLIDER = 3;

    const IS_RANDOM_TRUE = 1;
    const IS_RANDOM_FALSE = 0;

    const BB_PRESENT_TRUE = 1;
    const BB_PRESENT_FALSE = 0;

    const IV_PRESENT_TRUE = 1;
    const IV_PRESENT_FALSE = 0;

    public static function tableName()
    {
        return '{{%ank_questions}}';
    }

    public function rules()
    {
        return [
            [['id_ank', 'name_ua', 'name_ru'], 'required'],
            [
                [
                    'id_ank',
                    'npp',
                    'q_type',
                    'answ_min',
                    'answ_max',
                    'isRandom',
                    'bbPresent',
                    'ivPresent',
                    'openQuestionAnswerMaxLength'
                ],
                'integer'
            ],
            [['name_ua', 'name_ru'], 'string', 'max' => 255]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id_q' => Yii::t('app', 'ID'),
            'id_ank' => Yii::t('app', 'Questionnaire'),
            'npp' => Yii::t('app', 'Npp'),
            'name_ua' => Yii::t('app', 'Name [UA]'),
            'name_ru' => Yii::t('app', 'Name [RU]'),
            'q_type' => Yii::t('app', 'Type'),
            'answ_min' => Yii::t('app', 'Number of Answers [min]'),
            'answ_max' => Yii::t('app', 'Number of Answers [max]'),
            'isRandom' => Yii::t('app', 'Is Random'),
            'bbPresent' => Yii::t('app', 'Difficult to Answer Present'),
            'ivPresent' => Yii::t('app', 'Other Answer Present'),
            'openQuestionAnswerMaxLength' => Yii::t('app', 'Open Answer Length [max]'),
        ];
    }

    public function getQuestionnaire()
    {
        return $this->hasOne(Question::className(), ['id_ank' => 'id_ank']);
    }

    public function init()
    {
        $this->answ_min = 0;
        $this->answ_max = 0;
        $this->openQuestionAnswerMaxLength = 0;
        parent::init();
    }

    public function getQType()
    {
        switch ($this->q_type) {
            case static::Q_TYPE_CLOSE: {
                return Yii::t('app', 'Close');
            }
            case static::Q_TYPE_OPEN: {
                return Yii::t('app', 'Open');
            }
            case static::Q_TYPE_SLIDER: {
                return Yii::t('app', 'Slider');
            }
            default: {
                return null;
            }
        }
    }

    public function getIsRandom()
    {
        switch($this->isRandom) {
            case static::IS_RANDOM_FALSE: {
                return Yii::t('app', 'No');
            }
            case static::IS_RANDOM_TRUE: {
                return Yii::t('app', 'Yes');
            }
            default: {
                return null;
            }
        }
    }

    public function getBBPresent()
    {
        switch ($this->bbPresent) {
            case static::BB_PRESENT_FALSE: {
                return Yii::t('app', 'No');
            }
            case static::BB_PRESENT_TRUE: {
                return Yii::t('app', 'Yes');
            }
            default: {
                return null;
            }
        }
    }

    public function getIVPresent()
    {
        switch ($this->ivPresent) {
            case static::IV_PRESENT_FALSE: {
                return Yii::t('app', 'No');
            }
            case static::IV_PRESENT_TRUE: {
                return Yii::t('app', 'Yes');
            }
            default: {
                return null;
            }
        }
    }

    /*----------------------------------------------------------------------------------------------------------------*/

    public static function getQTypeOptions()
    {
        return [
            static::Q_TYPE_CLOSE => Yii::t('app', 'Close'),
            static::Q_TYPE_OPEN => Yii::t('app', 'Open'),
            static::Q_TYPE_SLIDER => Yii::t('app', 'Slider'),
        ];
    }

    public static function getIsRandomOptions()
    {
        return [
            static::IS_RANDOM_FALSE => Yii::t('app', 'No'),
            static::IS_RANDOM_TRUE => Yii::t('app', 'Yes'),
        ];
    }

    public static function getBBPresentOptions()
    {
        return [
            static::BB_PRESENT_FALSE => Yii::t('app', 'No'),
            static::BB_PRESENT_TRUE => Yii::t('app', 'Yes'),
        ];
    }

    public static function getIVPresentOptions()
    {
        return [
            static::IV_PRESENT_FALSE => Yii::t('app', 'No'),
            static::IV_PRESENT_TRUE => Yii::t('app', 'Yes'),
        ];
    }
}

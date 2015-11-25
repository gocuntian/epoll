<?php

namespace app\models;

use Yii;

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
class QuestionAnswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ank_answvariants}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_q', 'npp', 'isHidden', 'hasText', 'textMaxLength', 'isNoRandomized'], 'integer'],
            [['separator'], 'string', 'max' => 15],
            [['name_ua', 'name_ru'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_av' => Yii::t('app', 'Id Av'),
            'id_q' => Yii::t('app', 'Id Q'),
            'npp' => Yii::t('app', 'Npp'),
            'isHidden' => Yii::t('app', 'Is Hidden'),
            'hasText' => Yii::t('app', 'Has Text'),
            'textMaxLength' => Yii::t('app', 'Text Max Length'),
            'isNoRandomized' => Yii::t('app', 'Is No Randomized'),
            'separator' => Yii::t('app', 'Separator'),
            'name_ua' => Yii::t('app', 'Name Ua'),
            'name_ru' => Yii::t('app', 'Name Ru'),
        ];
    }
}

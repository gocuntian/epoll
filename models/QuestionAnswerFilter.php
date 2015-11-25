<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%ank_answvariants_filter}}".
 *
 * @property integer $id_av
 * @property integer $id_av_f
 * @property integer $isEnabled
 */
class QuestionAnswerFilter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ank_answvariants_filter}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_av', 'id_av_f'], 'required'],
            [['id_av', 'id_av_f', 'isEnabled'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_av' => Yii::t('app', 'Id Av'),
            'id_av_f' => Yii::t('app', 'Id Av F'),
            'isEnabled' => Yii::t('app', 'Is Enabled'),
        ];
    }
}

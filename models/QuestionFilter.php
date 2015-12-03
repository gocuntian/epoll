<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%ank_questions_filter}}".
 *
 * @property integer $id_q
 * @property integer $id_av_f
 * @property integer $isEnabled
 */
class QuestionFilter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ank_questions_filter}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_q', 'id_av_f'], 'required'],
            [['id_q', 'id_av_f', 'isEnabled'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_q' => Yii::t('app', 'Id Q'),
            'id_av_f' => Yii::t('app', 'Id Av F'),
            'isEnabled' => Yii::t('app', 'Is Enabled'),
        ];
    }
}

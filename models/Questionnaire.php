<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%ank_names}}".
 *
 * @property integer $id_ank
 * @property string $name_ua
 * @property string $name_ru
 */
class Questionnaire extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%ank_names}}';
    }

    public function rules()
    {
        return [
            [['name_ua', 'name_ru'], 'required'],
            [['name_ua', 'name_ru'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id_ank' => Yii::t('app', 'Id Ank'),
            'name_ua' => Yii::t('app', 'Name [UA]'),
            'name_ru' => Yii::t('app', 'Name [RU]'),
        ];
    }

    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['id_ank' => 'id_ank']);
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            foreach ($this->questions as $question) {
                $question->delete();
            }
            return true;
        } else {
            return false;
        }
    }
}

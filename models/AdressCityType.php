<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%adr_city_type}}".
 *
 * @property integer $id
 * @property string $s_name
 * @property string $f_name
 */
class AdressCityType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%adr_city_type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['s_name'], 'string', 'max' => 10],
            [['f_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            's_name' => Yii::t('app', 'S Name'),
            'f_name' => Yii::t('app', 'F Name'),
        ];
    }
}

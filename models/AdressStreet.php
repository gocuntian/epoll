<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%adr_street}}".
 *
 * @property integer $id
 * @property integer $s_type_id
 * @property string $s_name
 * @property integer $owner_id
 */
class AdressStreet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%adr_street}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['s_type_id', 'owner_id'], 'integer'],
            [['s_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            's_type_id' => Yii::t('app', 'S Type ID'),
            's_name' => Yii::t('app', 'S Name'),
            'owner_id' => Yii::t('app', 'Owner ID'),
        ];
    }
}

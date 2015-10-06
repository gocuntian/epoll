<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%adr_city}}".
 *
 * @property integer $id
 * @property string $c_name
 * @property integer $c_type_id
 * @property integer $is_grp
 * @property integer $parent_id
 */
class AdressCity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%adr_city}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_type_id', 'is_grp', 'parent_id'], 'integer'],
            [['c_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'c_name' => Yii::t('app', 'C Name'),
            'c_type_id' => Yii::t('app', 'C Type ID'),
            'is_grp' => Yii::t('app', 'Is Grp'),
            'parent_id' => Yii::t('app', 'Parent ID'),
        ];
    }
}

<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%adr_street_type}}".
 *
 * @property integer $id
 * @property string $s_name
 * @property string $f_name
 */
class AddressStreetType extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%adr_street_type}}';
    }

    public function rules()
    {
        return [
            [['s_name'], 'string', 'max' => 10],
            [['f_name'], 'string', 'max' => 50]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            's_name' => Yii::t('app', 'Short Name'),
            'f_name' => Yii::t('app', 'Full Name'),
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (empty($this->f_name)) {
                $this->f_name = $this->s_name;
            }
            return true;
        } else {
            return false;
        }
    }

    public function getAddressStreets()
    {
        return $this->hasMany(AddressStreet::className(), ['s_type_id' => 'id']);
    }

    /*----------------------------------------------------------------------------------------------------------------*/

    public static function getAddressStreetTypeOptions()
    {
        return ArrayHelper::map(static::find()
            ->select(['id', 'f_name'])
            ->all(), 'id', 'f_name');
    }
}

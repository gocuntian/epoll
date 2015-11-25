<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%adr_street}}".
 *
 * @property integer $id
 * @property integer $s_type_id
 * @property string $s_name
 * @property integer $owner_id
 *
 * @property AddressStreetType $addressStreetType
 * @property AddressCity $addressCity
 */
class AddressStreet extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%adr_street}}';
    }

    public function rules()
    {
        return [
            [['s_type_id', 'owner_id', 's_name'], 'required'],
            [['s_type_id', 'owner_id'], 'integer'],
            [['s_name'], 'string', 'max' => 50]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            's_type_id' => Yii::t('app', 'Type'),
            's_name' => Yii::t('app', 'Name'),
            'owner_id' => Yii::t('app', 'City'),
        ];
    }

    public function getAddressStreetType()
    {
        return $this->hasOne(AddressStreetType::className(), ['id' => 's_type_id']);
    }

    public function getAddressCity()
    {
        return $this->hasOne(AddressCity::className(), ['id' => 'owner_id']);
    }

    /*----------------------------------------------------------------------------------------------------------------*/

    public function getSTypeId()
    {
        return isset($this->addressStreetType) ? $this->addressStreetType->f_name : null;
    }

    public function getOwnerId()
    {
        return isset($this->addressCity) ? $this->addressCity->c_name : null;
    }
}

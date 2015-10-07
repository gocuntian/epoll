<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%adr_city}}".
 *
 * @property integer $id
 * @property string $c_name
 * @property integer $c_type_id
 * @property integer $is_grp
 * @property integer $parent_id
 *
 * @property AddressCityType $addressCityType
 * @property AddressCity $parentAddressCity
 */
class AddressCity extends ActiveRecord
{
	const IS_GRP_TRUE = 1;
	const IS_GRP_FALSE = 0;

	public static function tableName()
	{
		return '{{%adr_city}}';
	}

	public function rules()
	{
		return [
			[['c_name', 'c_type_id', 'is_grp'], 'required'],
			[['c_type_id', 'is_grp', 'parent_id'], 'integer'],
			[['c_name'], 'string', 'max' => 50],
		];
	}

	public function attributeLabels()
	{
		return [
			'id' => Yii::t('app', 'ID'),
			'c_name' => Yii::t('app', 'Name'),
			'c_type_id' => Yii::t('app', 'Type'),
			'is_grp' => Yii::t('app', 'Is Group'),
			'parent_id' => Yii::t('app', 'Parent'),
		];
	}

	public function getAddressCityType()
	{
		return $this->hasOne(AddressCityType::className(), ['id' => 'c_type_id']);
	}

	public function getParentAddressCity()
	{
		return $this->hasOne(AddressCity::className(), ['id' => 'parent_id']);
	}

	public function beforeSave($insert)
	{
		if (parent::beforeSave($insert)) {
			if (empty($this->parent_id)) {
				$this->parent_id = 0;
			}
			return true;
		} else {
			return false;
		}
	}

	/*----------------------------------------------------------------------------------------------------------------*/

	public function getIsGrp()
	{
		switch ($this->is_grp) {
			case static::IS_GRP_TRUE: {
				return Yii::t('app', 'Yes');
			}
			case static::IS_GRP_FALSE: {
				return Yii::t('app', 'No');
			}
			default: {
				return null;
			}
		}
	}

	public function getParentId()
	{
		return isset($this->parentAddressCity) ? $this->parentAddressCity->c_name : null;
	}

	public function getCTypeId()
	{
		return isset($this->addressCityType) ? $this->addressCityType->f_name : null;
	}

	/*----------------------------------------------------------------------------------------------------------------*/

	public static function getAllOwnerIdOptions()
	{
		return ArrayHelper::map(static::find()
			->select(['id', 'c_name'])
			->all(), 'id', 'c_name');
	}

	public static function getIsGrpOptions()
	{
		return [
			static::IS_GRP_FALSE => Yii::t('app', 'No'),
			static::IS_GRP_TRUE => Yii::t('app', 'Yes'),
		];
	}

	public static function getParentIdOptions($id = null)
	{
		$query = static::find()
			->select(['id', 'c_name']);

		if ($id) {
			$query->where(['!=', 'id', $id]);
		}

		return ArrayHelper::map($query->all(), 'id', 'c_name');
	}
}

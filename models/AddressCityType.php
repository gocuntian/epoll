<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%adr_city_type}}".
 *
 * @property integer $id
 * @property string $s_name
 * @property string $f_name
 */
class AddressCityType extends ActiveRecord
{
	public static function tableName()
	{
		return '{{%adr_city_type}}';
	}

	public function rules()
	{
		return [
			[['s_name'], 'required'],
			[['s_name'], 'string', 'max' => 10],
			[['f_name'], 'string', 'max' => 50],
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

	public function getAddressCities()
	{
		return $this->hasMany(AddressCity::className(), ['c_type_id' => 'id']);
	}

	/*----------------------------------------------------------------------------------------------------------------*/

	public static function getAddressCityTypeOptions()
	{
		return ArrayHelper::map(static::find()
			->select(['id', 'f_name'])
			->all(), 'id', 'f_name');
	}
}

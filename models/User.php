<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%users}}".
 *
 * @property integer $id
 * @property string $user_fname
 * @property string $user_lname
 * @property string $user_mname
 * @property string $user_login
 * @property string $user_pass
 * @property integer $hw_id
 * @property string $date_nar
 * @property string $stat
 * @property string $dom_addr
 * @property string $tel_num
 * @property string $email
 * @property integer $has_car
 * @property string $dtFrom
 * @property string $dtTo
 * @property integer $id_role
 * @property string $lang
 */
class User extends ActiveRecord implements IdentityInterface
{
	const SCENARIO_CREATE = 'create';

	const STAT_NA = 'n/a';
	const STAT_MALE = 'male';
	const STAT_FEMALE = 'female';

	const HAS_CAR_TRUE = 1;
	const HAS_CAR_FALSE = 0;

	const LANG_UA = 'ua';
	const LANG_RU = 'ru';

	public static function tableName()
	{
		return '{{%users}}';
	}

	public function rules()
	{
		return [
			[['user_login', 'email'], 'required'],
			[['user_pass'], 'required', 'on' => static::SCENARIO_CREATE],
			[['user_login'], 'unique'],
			[['email'], 'email'],
			[['hw_id', 'has_car', 'id_role'], 'integer'],
			[['date_nar', 'dtFrom', 'dtTo'], 'safe'],
			[['stat'], 'string'],
			[['user_fname', 'user_lname', 'user_mname', 'user_login', 'dom_addr', 'tel_num', 'email'], 'string', 'max' => 255],
			[['user_pass'], 'string', 'max' => 32],
			[['lang'], 'string', 'max' => 2],
			[['dtFrom'], 'default', 'value' => null],
		];
	}

	public function attributeLabels()
	{
		return [
			'id' => Yii::t('app', 'ID'),
			'user_fname' => Yii::t('app', 'First Name'),
			'user_lname' => Yii::t('app', 'Last Name'),
			'user_mname' => Yii::t('app', 'Middle Name'),
			'user_login' => Yii::t('app', 'Login'),
			'user_pass' => Yii::t('app', 'Password'),
			'hw_id' => Yii::t('app', 'Hw ID'),
			'date_nar' => Yii::t('app', 'Date Of Birth'),
			'stat' => Yii::t('app', 'Sex'),
			'dom_addr' => Yii::t('app', 'Home Address'),
			'tel_num' => Yii::t('app', 'Telephone'),
			'email' => Yii::t('app', 'Email'),
			'has_car' => Yii::t('app', 'Has Car?'),
			'dtFrom' => Yii::t('app', 'Start Date'),
			'dtTo' => Yii::t('app', 'End Date'),
			'id_role' => Yii::t('app', 'Role'),
			'lang' => Yii::t('app', 'Language'),
		];
	}

	public function getId()
	{
		return $this->getPrimaryKey();
	}

	public function getAuthKey()
	{
		return 1; // todo: add auth key implementation
	}

	public function setPassword($password)
	{
		$this->user_pass = $this->getPasswordHash($password);
	}

	public function getPassword()
	{
		return $this->user_pass;
	}

	public function validatePassword($password)
	{
		return $this->getPassword() === $this->getPasswordHash($password);
	}

	protected function getPasswordHash($password)
	{
		return md5($password);
	}

	public function validateAuthKey($authKey)
	{
		return $this->getAuthKey() === $authKey;
	}

	public static function findIdentityByAccessToken($token, $type = null)
	{
		throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
	}

	public static function findIdentity($id)
	{
		return static::findOne(['id' => $id]);
	}

	public static function findByUsername($username)
	{
		return static::findOne(['user_login' => $username]);
	}

	public static function findByEmail($email)
	{
		return static::findOne(['email' => $email]);
	}

	public function afterFind()
	{
		parent::afterFind();

		if ($this->date_nar == '0000-00-00') {
			$this->date_nar = null;
		}

		if ($this->dtFrom == '0000-00-00') {
			$this->dtFrom = null;
		}

		if ($this->dtTo == '0000-00-00') {
			$this->dtTo = null;
		}
	}

	public function getStat()
	{
		switch ($this->stat) {
			case static::STAT_NA: {
				return Yii::t('app', 'N/A');
			}
			case static::STAT_MALE: {
				return Yii::t('app', 'Male');
			}
			case static::STAT_FEMALE: {
				return Yii::t('app', 'Female');
			}
			default: {
				return null;
			}
		}
	}

	public function getHasCar()
	{
		switch ($this->has_car) {
			case static::HAS_CAR_TRUE: {
				return Yii::t('app', 'Yes');
			}
			case static::HAS_CAR_FALSE: {
				return Yii::t('app', 'No');
			}
			default: {
				return null;
			}
		}
	}

	public function getLang()
	{
		switch ($this->lang) {
			case static::LANG_UA: {
				return Yii::t('app', 'UA');
			}
			case static::LANG_RU: {
				return Yii::t('app', 'RU');
			}
			default: {
				return null;
			}
		}
	}

	/*----------------------------------------------------------------------------------------------------------------*/

	public static function getStatOptions()
	{
		return [
			static::STAT_NA => Yii::t('app', 'N/A'),
			static::STAT_MALE => Yii::t('app', 'Male'),
			static::STAT_FEMALE => Yii::t('app', 'Female'),
		];
	}

	public static function getHasCarOptions()
	{
		return [
			static::HAS_CAR_FALSE => Yii::t('app', 'No'),
			static::HAS_CAR_TRUE => Yii::t('app', 'Yes'),
		];
	}

	public static function getLangOptions()
	{
		return [
			static::LANG_UA => Yii::t('app', 'UA'),
			static::LANG_RU => Yii::t('app', 'RU'),
		];
	}
}

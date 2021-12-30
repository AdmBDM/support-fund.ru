<?php

namespace common\models;

use Yii;
use yii\base\Exception;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $phone_number
 * @property boolean $admin
 * @property boolean $oper
 * @property integer $when_ed
 * @property string $password write-only password
 * @property string $pswd
 * @property string $pswd_hash
 */
class User extends ActiveRecord implements IdentityInterface
{
	public $pswd;
	public $pswd_hash;

	const STATUS_DELETED = 0;
	const STATUS_INACTIVE = 9;
	const STATUS_ACTIVE = 10;

	/**
	 * @return string
	 */
	public static function tableName(): string
	{
		return mb_strtolower(Fields::TAB_USER);
	}

	/**
	 * @return string[]
	 */
	public function behaviors(): array
	{
		return [
			TimestampBehavior::class,
		];
	}

	/**
	 * @return array|array[]|string[]|null
	 */
	public function attributeLabels() {
		return Fields::getAttributes(Fields::TAB_USER);
	}

	/**
	 * @return array[]
	 */
	public function rules(): array
	{
//		return [
//			['status', 'default', 'value' => self::STATUS_INACTIVE],
//			['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
//		];
		return Fields::getRules(Fields::TAB_USER);
	}

	/**
	 * @param int|string $id
	 *
	 * @return User|IdentityInterface|null
	 */
	public static function findIdentity($id)
	{
		return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
	}

	/**
	 * @param mixed $token
	 * @param null  $type
	 *
	 * @return void|IdentityInterface|null
	 * @throws NotSupportedException
	 */
	public static function findIdentityByAccessToken($token, $type = null)
	{
		throw new NotSupportedException('Поиск токена результатов не дал.');
	}

	/**
	 * Finds user by username
	 *
	 * @param string $username
	 *
	 * @return static|null
	 */
	public static function findByUsername(string $username)
	{
		return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
	}

	/**
	 * Finds user by password reset token
	 *
	 * @param string $token password reset token
	 *
	 * @return static|null
	 */
	public static function findByPasswordResetToken(string $token)
	{
		if (!static::isPasswordResetTokenValid($token)) {
			return null;
		}

		return static::findOne([
			'password_reset_token' => $token,
			'status' => self::STATUS_ACTIVE,
		]);
	}

	/**
	 * Finds user by verification email token
	 *
	 * @param string $token verify email token
	 *
	 * @return static|null
	 */
	public static function findByVerificationToken(string $token) {
		return static::findOne([
			'verification_token' => $token,
			'status' => self::STATUS_INACTIVE
		]);
	}

	/**
	 * Finds out if password reset token is valid
	 *
	 * @param string $token password reset token
	 *
	 * @return bool
	 */
	public static function isPasswordResetTokenValid(string $token): bool
	{
		if (empty($token)) {
			return false;
		}

		$timestamp = (int) substr($token, strrpos($token, '_') + 1);
		$expire = Yii::$app->params['user.passwordResetTokenExpire'];
		return $timestamp + $expire >= time();
	}

	/**
	 * @return array|int|mixed|string|null
	 */
	public function getId()
	{
		return $this->getPrimaryKey();
	}

	/**
	 * @return string|null
	 */
	public function getAuthKey()
	{
		return $this->auth_key;
	}

	/**
	 * @param $authKey
	 * @return bool
	 */
	public function validateAuthKey($authKey): bool
	{
		return $this->getAuthKey() === $authKey;
	}

	/**
	 * Validates password
	 *
	 * @param string $password password to validate
	 *
	 * @return bool if password provided is valid for current user
	 */
	public function validatePassword(string $password): bool
	{
		return Yii::$app->security->validatePassword($password, $this->password_hash);
	}

	/**
	 * Generates password hash from password and sets it to the model
	 *
	 * @param $password
	 *
	 * @throws Exception
	 */
	public function setPassword($password)
	{
		$this->password_hash = Yii::$app->security->generatePasswordHash($password);
	}

	/**
	 * Generates "remember me" authentication key
	 *
	 * @throws Exception
	 */
	public function generateAuthKey()
	{
//		try {
			$this->auth_key = Yii::$app->security->generateRandomString();
//		} catch (Exception $e) {
//		}
	}

	/**
	 * Generates new password reset token
	 *
	 * @throws Exception
	 */
	public function generatePasswordResetToken()
	{
		$this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
	}

	/**
	 * Generates new token for email verification
	 *
	 * @throws Exception
	 */
	public function generateEmailVerificationToken()
	{
		$this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
	}

	/**
	 * Removes password reset token
	 */
	public function removePasswordResetToken()
	{
		$this->password_reset_token = null;
	}

	/**
	 * Finds user by phone
	 *
	 * @param string $phone_number
	 * @return static|null
	 */
	public static function findByPhone(string $phone_number)
	{
		$phone_number = str_replace(' ', '', str_replace('(', '', str_replace(')', '', str_replace('-', '', $phone_number))));

		return static::findOne(['phone_number' => $phone_number]);
	}

	/**
	 * Finds user by email
	 *
	 * @param string $email
	 * @return static|null
	 */
	public static function findByEmail(string $email)
	{
		return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
	}
}

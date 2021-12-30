<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
	public $username;
	public $password;
	public $email;
	public $phone_number;
	public $rememberMe = true;

	private $_user;

	/**
	 * @return array
	 */
	public function rules(): array
	{
		return Fields::getRules(Fields::FORM_LOGIN);
	}

	/**
	 * @return string[]
	 */
	public function attributeLabels(): array
	{
		return Fields::getAttributes(Fields::FORM_LOGIN);
	}

	/**
	 * Validates the password.
	 * This method serves as the inline validation for password.
	 *
	 * @param string $attribute the attribute currently being validated
	 * @param array  $params    the additional name-value pairs given in the rule
	 */
	public function validatePassword($attribute, $params)
	{
		if (!$this->hasErrors()) {
			$user = $this->getUser();

			if (!$user || !$user->validatePassword($this->password)) {
				$this->addError($attribute, 'Указанная комбинация не существует!');
			}
//			if (!$user) {
//				$this->addError($attribute, 'Проблемы с юзером!');
//			}
//			if (!$user->validatePassword($this->password)) {
//				$this->addError($attribute, 'Проблемы с паролем!');
//			}
		}
	}

	/**
	 * Logs in a user using the provided username and password.
	 *
	 * @return bool whether the user is logged in successfully
	 */
	public function login(): bool
	{

		if ($this->validate()) {
			return Yii::$app->user->login($this->getUser(), $this->rememberMe ? Yii::$app->params['cacheLoginTime'] : 0);
		}

		return false;
	}

	/**
	 * Finds user by [[username]]
	 *
	 * @return User|null
	 */
	protected function getUser()
	{
		if ($this->_user === null) {
			$this->_user = User::findByUsername($this->username);
		}

		if (Yii::$app->params['checkPassword'] == CHECK_FROM_EMAIL) {
			$this->_user = User::findByEmail($this->email);

//		} elseif (Yii::$app->params['checkPassword'] == CHECK_FROM_UNAME) {
//			$this->_user = User::findByUsername($this->username);

		} elseif (Yii::$app->params['checkPassword'] == CHECK_FROM_SMS) {
			$this->_user = User::findByPhone($this->phone_number);

		}

		return $this->_user;
	}
}

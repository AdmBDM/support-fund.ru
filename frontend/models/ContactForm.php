<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
	public $name;
	public $email;
	public $subject;
	public $body;
	public $verifyCode;


	/**
	 * @return array
	 */
	public function rules(): array
	{
		return [
			// name, email, subject and body are required
//			[['name', 'email', 'subject', 'body'], 'required'],
			[['name', 'email', 'body'], 'required'],
			['body', 'string', 'min' => 7, 'max' => 2000],
			// email has to be a valid email address
			['email', 'email'],
			// verifyCode needs to be entered correctly
			['verifyCode', 'captcha'],
		];
	}

	/**
	 * @return string[]
	 */
	public function attributeLabels(): array
	{
		return [
			'name' => 'Имя',
			'email' => 'E-mail',
			'subject' => 'Тема',
			'body' => 'Сообщение',
			'verifyCode' => 'Код подтверждения',
		];
	}

	/**
	 * Sends an email to the specified email address using the information collected by this model.
	 *
	 * @param string $email the target email address
	 *
	 * @return bool whether the email was sent
	 */
	public function sendEmail(string $email): bool
	{
		return Yii::$app->mailer->compose()
			->setTo($email)
			->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
			->setReplyTo([$this->email => $this->name])
			->setSubject($this->subject)
			->setTextBody($this->body)
			->send();
	}
}

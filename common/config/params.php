<?php
return [
	'adminEmail' => 'admin@example.com',
	'supportEmail' => 'support@example.com',
	'senderEmail' => 'noreply@example.com',
	'senderName' => 'Example.com mailer',
	'user.passwordResetTokenExpire' => 3600,
	'user.passwordMinLength' => 8,
//	'cacheLoginTime' => 3600 * 24 * 30,		//кэш логина на месяц
	'cacheLoginTime' => 3600 * 24,			//кэш логина на сутки
	'messages' => [
		'throwNotFound' => 'Запрашиваемая страница отсутствует.',
	],
];

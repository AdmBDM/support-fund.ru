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
		'dataDel' => 'Вы действительно хотите удалить данные?',
	],
	'dir' => [
		'files' => 'ukpfiles/',
		'docs' => 'docs/',
	],
	'load_files' => 'png, jpg, pdf',
	'max_load_files' => 5,
	'checkPassword' => CHECK_FROM_UNAME,
//	'checkPassword' => CHECK_FROM_SMS,
//	'checkPassword' => CHECK_FROM_EMAIL,
];

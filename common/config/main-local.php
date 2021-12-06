<?php

//--- массив параметров подключения ---
	if (strpos($_SERVER['CONTEXT_DOCUMENT_ROOT'], ':') === false) {
		define('DATA_CONNECT_HOST', '127.0.0.1');
	} else {
		define('DATA_CONNECT_HOST', 'rfprt.ru');
	}
	$config = [
		'components' => [
			'db' => [
				'class' => 'yii\db\Connection',
				'dsn' => 'pgsql:host=' . DATA_CONNECT_HOST . ';port=5432;dbname=sf',
				'username' => 'dbusersf',
				'password' => '8G6x4J2gD3i1W8x1',
				'charset' => 'utf8',
			],
			'mailer' => [
				'class' => 'yii\swiftmailer\Mailer',
				'viewPath' => '@common/mail',
			],
		],
	];
return $config;
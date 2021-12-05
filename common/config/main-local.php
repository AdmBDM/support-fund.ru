<?php

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
		    'dsn' => 'pgsql:host=rfprt.ru;port=5432;dbname=sf',
		    'username' => 'dbusersf',
		    'password' => '8G6x4J2gD3i1W8x1',
		    'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => true,
        ],
    ],
];

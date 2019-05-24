<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		'authManager' => [
			'class' => 'yii\rbac\DbManager',
			'cache' => 'cache', //включение кэширования
		],
		'cache' => [
			'class' => 'yii\caching\FileCache', //подключение файлового кэширования данных, снизит нагрузку бд на сервер
		],
    ],
];
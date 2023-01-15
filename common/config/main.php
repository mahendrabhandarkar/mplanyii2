<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
	'timeZone' => 'Asia/Kolkata',
	// set target language to be Hindi [hi_IN]
	'language' => 'hi_IN',
	// set source language to be English
	'sourceLanguage' => 'en-US',
	'basePath' => '@common/messages',
	'name' => 'Jain Kalar',
	'modules' => [
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		'i18n' => [
            'translations' => [
                'yii2mod.rbac' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii2mod/rbac/messages',
                ],
				/*
				'app*' => [
					'class' => 'yii\i18n\PhpMessageSource',
					'basePath' => '@common/messages',
				],
				*/
				'backend*' => [
					'class' => 'yii\i18n\PhpMessageSource',
					'basePath' => '@common/messages',
				],
                'app*' => [
					'class' => 'yii\i18n\PhpMessageSource',
					'basePath' => '@common/messages',
				//	'sourceLanguage' => 'en-US',
					'fileMap' => [
						'app' => 'app.php',
						'app/error' => 'error.php',
					],
				/*	'on missingTranslation' => ['common\components\TranslationEventHandler', 'handleMissingTranslation'], */
				],
            ],
        ],
        'formatter' => [ //for the showing of date datetime
            'dateFormat' => 'dd-MM-yyyy',
            'datetimeFormat' => 'dd-MM-yyyy HH:mm:ss',
            'decimalSeparator' => '.',
            'thousandSeparator' => ',',
            'currencyCode' => 'INR',
        ],
    ],
];

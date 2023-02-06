<?php

use yii\httpclient\JsonParser;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','debug'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['1.2.3.4', '127.0.0.1', '::1']
        ],
        'v1' => [
			'class' => 'api\modules\v1\Module',
		],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'parsers' => [
                'application/json' => JsonParser::class,
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\Users',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
		'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
		//	'suffix' => '.html',
            'rules' => [
                // [
                //     'class' => 'yii\rest\UrlRule',
                //     'controller' => ['v1/<controller:\w+>'],
                // ],
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<id:[a-z\-]+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<id:[a-z\-]+>' => '<controller>/<action>',
            ],
        ],
        'view' => [
            'theme' => [
                'basePath' => '@app/themes/mplan',
                'baseUrl' => '@web/mplanyii2/frontend',
                'pathMap' => [
                    '@app/views' => '@app/themes/mplan',
                    '@app/modules' => '@app/themes/mplan/modules',
                    '@app/widgets' => '@app/themes/mplan/widgets',
                ],
            ],
        ],
		'authManager' => [
            'class' => 'yii\rbac\DbManager',
			'defaultRoles' => ['guest', 'bride', 'groom', 'samajverifier', 'superadmin'],
			'itemTable' => 'auth_item',
			'itemChildTable' => 'auth_item_child',
			'assignmentTable' => 'auth_assignment',
			'ruleTable' => 'auth_rule',
            // uncomment if you want to cache RBAC items hierarchy
            // 'cache' => 'cache',
        ],
    ],
    'params' => $params,
];

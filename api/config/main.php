<?php

use yii\web\JsonParser;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','debug'],
    'controllerNamespace' => 'api\modules\v1\controllers',
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
            'csrfParam' => '_csrf-api',
            'parsers' => [
                'application/json' => JsonParser::class,
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\Users',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-api', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the api
            'name' => 'advanced-api',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'prefix' => function ($message) {
                        $user = Yii::$app->has('user', true) ? Yii::$app->get('user') : null;
                        $userID = $user ? $user->getId(false) : '-';
                        return "[$userID]";
                    },
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
		'urlManager' => [
			'enablePrettyUrl' => true,
			'enableStrictParsing' => true,
			'showScriptName' => false,
			'rules' => [
				['class' => 'yii\rest\UrlRule',
				'controller' => [
                        'v1/<controller:\w+>/<id:\d+>' => '<controller>/view',
						'v1/<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
						'v1/<controller:\w+>/<action:\w+>' => '<controller>/<action>',
						'v1/<controller:\w+>/<action:\w+>/<id:[a-z\-]+>' => '<controller>/<action>',
						'v1/<controller:\w+>/<action:\w+>/<id:[a-z\-]+>' => '<controller>/<action>',
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ],
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

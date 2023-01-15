<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log', 'debug', 'gii'],
    'modules' => [
        'debug' => 'yii\debug\Module',
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['127.0.0.1', 'localhost', '::1'],
            'generators' => [
                'migrik' => [
                    'class' => \insolita\migrik\gii\StructureGenerator::class,
                    'templates' => [
                        'custom' => '@backend/gii/templates/migrator_schema',
                    ],
                ],
                'migrikdata' => [
                    'class' => \insolita\migrik\gii\DataGenerator::class,
                    'templates' => [
                        'custom' => '@backend/gii/templates/migrator_data',
                    ],
                ],
                'rest-model' => [ // generator name
                    'class' => 'bestyii\giiRest\generators\model\Generator', // generator class
                ],
                'rest-crud' => [ // generator name
                    'class' => 'bestyii\giiRest\generators\crud\Generator', // generator class
                ]
            ],
        ],
        'api' => [
            'class' => 'app\modules\api\Module',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\AdminUser',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['admin', 'subadmin'],
            'itemTable' => 'admin_auth_item',
            'itemChildTable' => 'admin_auth_item_child',
            'assignmentTable' => 'admin_auth_assignment',
            'ruleTable' => 'admin_auth_rule',
            // uncomment if you want to cache RBAC items hierarchy
            // 'cache' => 'cache',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
            'showScriptName' => true,
            'rules' => [
                // Others Controllers
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
        'view' => [
            'theme' => [
                'basePath' => '@app/themes/adminlte',
                'baseUrl' => '@web/mplanyii2/backend',
                'pathMap' => [
                    '@app/views' => '@app/themes/adminlte',
                    '@app/modules' => '@app/themes/adminlte/modules',
                    '@app/widgets' => '@app/themes/adminlte/widgets',
                ],
            ],
        ],
    ],
    'params' => $params,
];
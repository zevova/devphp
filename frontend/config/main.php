<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
			'baseUrl' => '',
            'csrfParam' => '_csrf-frontend',
			'parsers' => [
				//'application/json' => 'yii\web\JsonParser',
			],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
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
        'urlManager' => [
            'enablePrettyUrl' => true,
			'enableStrictParsing' => true,
            'showScriptName' => false,
			'rules' => [
				[
					'class' => 'yii\rest\UrlRule', 
					'controller' => [
						'blog/article' => 'blog/article',
						'blog/category' => 'blog/category',
						'blog/tag' => 'blog/tag',						
					],
				],
				[
					'class' => 'yii\rest\UrlRule',
					'controller' => ['article' => 'blog/article'],
					'prefix' => 'blog/category/<categoryId:\d+>',
				],
				[
					'class' => 'yii\rest\UrlRule',
					'controller' => ['article' => 'blog/article'],
					'prefix' => 'blog/tag/<tagId:\d+>',
				],
			],
        ],
    ],
    'params' => $params,
];

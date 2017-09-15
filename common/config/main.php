<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
	'controllerMap' => [
		'migration' => [
			'class' => 'bizley\migration\controllers\MigrationController',
		],
	],
	'modules' => [
        'blog' => [
            'class' => 'modules\blog\Module',
        ],
    ],
];

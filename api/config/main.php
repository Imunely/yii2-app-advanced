<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [

    'id' => 'app-api',
    'basePath' => dirname(__DIR__),

    'bootstrap' => ['log'],

    'modules' => [
        'v1' => [
            'basePath' => '@app/modules/v1',
            'class' => 'api\modules\v1\Module'
        ]
    ],

    'aliases' => [
        '@api' => dirname(dirname(__DIR__)) . '/api',
    ],

    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'response' => [
            'format' => 'json',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
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

        'urlManager' => [
            'enablePrettyUrl' =>  true,
            'enableStrictParsing' => false,
            'showScriptName' => false,
            //http://yii-api.loc/api/v1/userl
            'rules' => [
                [
                    'pluralize' => true,
                    'class' => \yii\rest\UrlRule::class,
                    'controller' => ['v1/userl'],
                    'prefix' => 'api',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ],
                    'extraPatterns' => [
                        'POST auth' => 'auth',
                        'POST login' => 'login',
                        'POST registration' => 'registration',
                        'POST message' => 'message',
                        'GET getmessageforuser' => 'getmessageforuser',
                        'GET go' => 'go'
                    ],
                ]
            ],
        ]
    ],

    'params' => $params,
];

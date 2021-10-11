<?php

use common\models\User as UserIdentity;
use yii\web\JsonParser;
use yii\web\UrlManager;
use yii\web\Response;
use yii\web\User;

$params = array_merge(
    require __DIR__ . '/../../../config/params.php',
    require __DIR__ . '/../../../config/params-local.php',
);

return [
    'id' => 'api-sed',
    'basePath' => dirname(__DIR__),
    'components' => [
        'user' => [
            'class' => User::class,
            'identityClass' => UserIdentity::class,
            'enableAutoLogin' => false,
            'enableSession' => false,
        ],
        'urlManager' => [
            'class' => UrlManager::class,
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
        ],
        'response' => [
            'class' => Response::class,
            'format' => Response::FORMAT_JSON
        ],
        'request' => [
            'class' => 'yii\web\Request',
            'enableCsrfValidation' => false,
            'parsers' => [
                'application/json' => JsonParser::class
            ]
        ],
    ],
    'params' => $params,
];

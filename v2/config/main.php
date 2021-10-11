<?php

use common\models\User;
use yii\web\UrlManager;

$params = array_merge(
    require __DIR__ . '/../../../config/params.php',
    require __DIR__ . '/../../../config/params-local.php',
);

return [
    'id' => 'api-v2',
    'basePath' => dirname(__DIR__),
    'components' => [
        'user' => [
            'class' => \yii\web\User::class,
            'identityClass' => User::class,
            'enableAutoLogin' => false,
            'enableSession' => false,
        ],
        'urlManager' => [
            'class' => UrlManager::class,
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
        ],
    ],
    'params' => $params,
];

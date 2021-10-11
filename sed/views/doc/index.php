<?php

use common\helpers\Env;

$paths = [];
$schemas = [];

$token = Env::apiSedToken();
$tokenText = '';
if (!Env::isProduction()) {
    $tokenText = "Для работы с АПИ нужно нажать на кнопку \"Authorize\" и указать токен: {$token}";
}

foreach (glob(Yii::getAlias('@api/') . 'modules/sed/docs/*.php') as $file) {
    $result = [];
    require $file;
    $paths = array_merge($paths, $result['paths']);
    $schemas = array_merge($schemas, $result['schemas']);
}

$swaggerJson = [
    'openapi' => '3.0.1',
    'info' => [
        'description' => $tokenText,
        'version' => '1.0',
        'title' => 'ЕРОН АПИ СЭД',
        'license' => [
            'name' => 'Apache 2.0',
            'url' => 'http://www.apache.org/licenses/LICENSE-2.0.html'
        ],
    ],
    'paths' => $paths,
    'components' => [
        'securitySchemes' => [
            'bearerAuth' => [
                'type' => 'http',
                'scheme' => 'bearer'
            ],
        ],
        'schemas' => $schemas,
    ],
];


?>

<?= json_encode($swaggerJson); ?>
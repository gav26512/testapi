<?php
$paths = [
    '/oauth2/token' => [
        'post' => [
            'tags' => ['Authentication'],
            'summary' => 'Получение токена',
            'security' => [],
            'requestBody' => [
                'content' => [
                    'application/x-www-form-urlencoded' => [
                        'schema' => [
                            '$ref' => '#/components/schemas/AuthenticationRequest'
                        ],
                    ],
                    'application/json' => [
                        'schema' => [
                            '$ref' => '#/components/schemas/AuthenticationRequest'
                        ],
                    ],
                ],
                'required' => true,
            ],
            'responses' => [
                '200' => [
                    'description' => 'Успешная аутентификация',
                    'content' => [
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/AuthenticationResponse'
                            ],
                        ],
                        'application/x-www-form-urlencoded' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/AuthenticationResponse'
                            ],
                        ],
                    ],
                ],
                '400' => [
                    'description' => 'Не успешная аутентификация',
                    'content' => [
                        'application/json' => [
                            'schema' => [
                                'type' => 'object',
                                'properties' => [
                                    'name' => [
                                        'type' => 'string',
                                        'example' => 'Bad Request',
                                    ],
                                    'message' => [
                                        'type' => 'string',
                                        'example' => 'The client credentials are invalid',
                                    ],
                                    'code' => [
                                        'type' => 'integer',
                                        'example' => 0,
                                    ],
                                    'status' => [
                                        'type' => 'integer',
                                        'example' => 400,
                                    ],
                                    'type' => [
                                        'type' => 'string',
                                        'example' => 'filsh\yii2\oauth2server\exceptions\HttpException',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];

$schemas = [
    'AuthenticationRequest' => [
        'type' => 'object',
        'required' => [
            'client_id',
            'client_secret',
            'grant_type',
            'scope',
        ],
        'properties' => [
            'client_id' => [
                'type' => 'string',
                'example' => 'gav',
            ],
            'client_secret' => [
                'type' => 'string',
                'example' => 'Sok0l',
            ],
            'grant_type' => [
                'type' => 'string',
                'example' => 'client_credentials',
            ],
            'scope' => [
                'type' => 'string',
                'example' => 'read write',
            ],
        ],
    ],
    'AuthenticationResponse' => [
        'description' => 'Модель результата успешное получения токена',
        'type' => 'object',
        'required' => [
            'access_token',
            'expires_in',
            'token_type',
            'scope',
        ],
        'properties' => [
            'access_token' => [
                'type' => 'string',
                'example' => '60b85f6aa33067c76ebe515839b1710c327ff1d4',
            ],
            'expires_in' => [
                'type' => 'integer',
                'example' => 86400,
            ],
            'token_type' => [
                'type' => 'string',
                'example' => 'Bearer',
            ],
            'scope' => [
                'type' => 'string',
                'example' => 'read write',
            ],
        ],
    ],
];

foreach (glob(Yii::getAlias('@api/') . 'modules/v2/documentations/*.php') as $file) {
    $result = [];
    require $file;
    $paths = array_merge($paths, $result['paths']);
    $schemas = array_merge($schemas, $result['schemas']);
}


$swaggerJson = [
    'openapi' => '3.0.1',
    'info' => [
        'description' => 'ЕРОН',
        'version' => '2.0',
        'title' => 'ЕРОН REST API',
        'license' => [
            'name' => 'Apache 2.0',
            'url' => 'http://www.apache.org/licenses/LICENSE-2.0.html'
        ],
    ],
    'servers' => [
        [
            'url' => 'https://komnportal-test.fix-price.ru/api2/v2',
            'description' => 'TEST'
        ],
        [
            'url' => 'https://dev.komnportal.fix-price.ru/api2/v2',
            'description' => 'TEST'
        ],
        [
            'url' => 'http://eron.local:1080/api2/v2',
            'description' => 'local'
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


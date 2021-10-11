<?php

$result = [
    'paths' => [
        '/api2/sed/status-object/contract-uploaded-to-sed' => [
            'post' => [
                'tags' => ['СЭД'],
                'summary' => 'Присвоение статуса "Договор загружен в СЭД (215)"',
                'security' => [
                    [
                        'bearerAuth' => [
                            'read'
                        ],
                    ],
                ],
                'requestBody' => [
                    'content' => [
                        'application/x-www-form-urlencoded' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/StatusObjectRequest'
                            ],
                        ],
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/StatusObjectRequest'
                            ],
                        ],
                    ],
                    'required' => true,
                ],
                'responses' => [
                    '200' => [
                        'description' => 'OK',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/SuccessResponses'
                                ],
                            ],
                        ],
                    ],
                    '400' => [
                        'description' => 'Ошибка',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/ErrorResponses'
                                ],
                            ],
                        ],
                    ],
                ]
            ],
        ],
        '/api2/sed/status-object/rejected-before-open' => [
            'post' => [
                'tags' => ['СЭД'],
                'summary' => 'Присвоение статуса "Отказ до открытия (216)"',
                'security' => [
                    [
                        'bearerAuth' => [
                            'read'
                        ],
                    ],
                ],
                'requestBody' => [
                    'content' => [
                        'application/x-www-form-urlencoded' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/StatusObjectRequest'
                            ],
                        ],
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/StatusObjectRequest'
                            ],
                        ],
                    ],
                    'required' => true,
                ],
                'responses' => [
                    '200' => [
                        'description' => 'OK',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/SuccessResponses'
                                ],
                            ],
                        ],
                    ],
                    '400' => [
                        'description' => 'Ошибка',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/ErrorResponses'
                                ],
                            ],
                        ],
                    ],
                ]
            ],
        ],
        '/api2/sed/status-object/stopped-flow-operations' => [
            'post' => [
                'tags' => ['СЭД'],
                'summary' => 'Присвоение статуса "Остановлен поток операций (217)"',
                'security' => [
                    [
                        'bearerAuth' => [
                            'read'
                        ],
                    ],
                ],
                'requestBody' => [
                    'content' => [
                        'application/x-www-form-urlencoded' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/StatusObjectRequest'
                            ],
                        ],
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/StatusObjectRequest'
                            ],
                        ],
                    ],
                    'required' => true,
                ],

                'responses' => [
                    '200' => [
                        'description' => 'OK',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/SuccessResponses'
                                ],
                            ],
                        ],
                    ],
                    '400' => [
                        'description' => 'Ошибка',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/ErrorResponses'
                                ],
                            ],
                        ],
                    ],
                ]
            ],
        ],
        '/api2/sed/status-object/doc-in-sed-rejected-kru' => [
            'post' => [
                'tags' => ['СЭД'],
                'summary' => 'Присвоение статуса "Отклонено КРУ (Подписание документов) (218)"',
                'security' => [
                    [
                        'bearerAuth' => [
                            'read'
                        ],
                    ],
                ],
                'requestBody' => [
                    'content' => [
                        'application/x-www-form-urlencoded' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/StatusObjectRequest'
                            ],
                        ],
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/StatusObjectRequest'
                            ],
                        ],
                    ],
                    'required' => true,
                ],
                'responses' => [
                    '200' => [
                        'description' => 'OK',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/SuccessResponses'
                                ],
                            ],
                        ],
                    ],
                    '400' => [
                        'description' => 'Ошибка',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/ErrorResponses'
                                ],
                            ],
                        ],
                    ],
                ]
            ],
        ],
        '/api2/sed/status-object/doc-in-contract-was-again-send-approval' => [
            'post' => [
                'tags' => ['СЭД'],
                'summary' => 'Присвоение статуса "Договор повторно отправлен на согласование (Подписание документов) (228)"',
                'security' => [
                    [
                        'bearerAuth' => [
                            'read'
                        ],
                    ],
                ],
                'requestBody' => [
                    'content' => [
                        'application/x-www-form-urlencoded' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/StatusObjectRequest'
                            ],
                        ],
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/StatusObjectRequest'
                            ],
                        ],
                    ],
                    'required' => true,
                ],
                'responses' => [
                    '200' => [
                        'description' => 'OK',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/SuccessResponses'
                                ],
                            ],
                        ],
                    ],
                    '400' => [
                        'description' => 'Ошибка',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/ErrorResponses'
                                ],
                            ],
                        ],
                    ],
                ]
            ],
        ],
        '/api2/sed/status-object/lease-agreement-in-sed-signed-all' => [
            'post' => [
                'tags' => ['СЭД'],
                'summary' => 'Присвоение статуса "Договор аренды в СЭД подписан с обеих сторон (235)"',
                'security' => [
                    [
                        'bearerAuth' => [
                            'read'
                        ],
                    ],
                ],
                'requestBody' => [
                    'content' => [
                        'application/x-www-form-urlencoded' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/StatusObjectRequest'
                            ],
                        ],
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/StatusObjectRequest'
                            ],
                        ],
                    ],
                    'required' => true,
                ],
                'responses' => [
                    '200' => [
                        'description' => 'OK',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/SuccessResponses'
                                ],
                            ],
                        ],
                    ],
                    '400' => [
                        'description' => 'Ошибка',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/ErrorResponses'
                                ],
                            ],
                        ],
                    ],
                ]
            ],
        ],
        '/api2/sed/status-object/lease-agreement-in-sed-signed-gd' => [
            'post' => [
                'tags' => ['СЭД'],
                'summary' => 'Присвоение статуса "Договор аренды в СЭД подписан ГД (236)"',
                'security' => [
                    [
                        'bearerAuth' => [
                            'read'
                        ],
                    ],
                ],
                'requestBody' => [
                    'content' => [
                        'application/x-www-form-urlencoded' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/StatusObjectRequest'
                            ],
                        ],
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/StatusObjectRequest'
                            ],
                        ],
                    ],
                    'required' => true,
                ],
                'responses' => [
                    '200' => [
                        'description' => 'OK',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/SuccessResponses'
                                ],
                            ],
                        ],
                    ],
                    '400' => [
                        'description' => 'Ошибка',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/ErrorResponses'
                                ],
                            ],
                        ],
                    ],
                ]
            ],
        ],
    ],
    'schemas' => [
        'ErrorResponses' => [
            'description' => 'Ответ при ошибках',
            'type' => 'object',
            'properties' => [
                'name' => [
                    'type' => 'string',
                    'example' => 'Bad request',
                ],
                'message' => [
                    'type' => 'string',
                    'example' => 'Ошибка выполнения api',
                ],
                'code' => [
                    'type' => 'integer',
                ],
                'type' => [
                    'type' => 'string',
                    'example' => 'common\lib\web\HttpException',
                ],
                'status' => [
                    'type' => 'integer',
                    'example' => '400',
                ],
            ],
        ],
        'SuccessResponses' => [
            'type' => 'object',
            'properties' => [
                'result' => [
                    'type' => 'string',
                    'example' => 'ok',
                ],
                'message' => [
                    'type' => 'string',
                    'example' => 'Статус присвоен успешно',
                ],
            ]
        ],
        'StatusObjectRequest' => [
            'type' => 'object',
            'required' => [
                'objectId',
                'datetime'
            ],
            'properties' => [
                'objectId' => [
                    'type' => 'integer',
                    'example' => 103330,
                ],
                'datetime' => [
                    'type' => 'string',
                    'example' => '2021-09-09 12:12:12',
                    'format' => 'date time'
                ],
            ],
        ],
    ],
];
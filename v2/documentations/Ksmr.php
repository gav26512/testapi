<?php

$result = [
    'paths' => [
        '/ksmr/get-detail-task-header?objectid={objectid}' => [
            'get' => [
                'tags' => ['КСМР'],
                'summary' => 'Получение описания задачи',
                'security' => [
                    [
                        'bearerAuth' => [
                            'read'
                        ],
                    ],
                ],
                'parameters' => [
                    [
                        'name' => 'objectid',
                        'in' => 'path',
                        'description' => 'Уникальный идентификатор объекта',
                        'required' => true,
                        'schema' => [
                            'type' => 'integer',
                            'example' => 103330,
                        ],
                    ],
                ],
                'responses' => [
                    '200' => [
                        'description' => 'OK',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/DetailTaskHeaderResponse'
                                ],
                            ],
                            'application/x-www-form-urlencoded' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/DetailTaskHeaderResponse'
                                ],
                            ],
                        ],
                    ],
                    '400' => [
                        'description' => 'BadRequest',
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
                                            'example' => 'Не правильный параметр "objectid"',
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
                                            'example' => 'yii\web\BadRequestHttpException',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        '/ksmr/get-objects-engineer' => [
            'post' => [
                'tags' => ['КСМР'],
                'summary' => 'Получение объектов инженера',
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
                                '$ref' => '#/components/schemas/ObjectsEngineerRequest'
                            ],
                        ],
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/ObjectsEngineerRequest'
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
                                    '$ref' => '#/components/schemas/ObjectsEngineerResponse'
                                ],
                            ],
                            'application/x-www-form-urlencoded' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/ObjectsEngineerResponse'
                                ],
                            ],
                        ],
                    ],
                    '400' => [
                        'description' => 'BadRequest',
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
                                            'example' => 'Не правильный параметр "engineer"',
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
                                            'example' => 'yii\web\BadRequestHttpException',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        '/ksmr/get-object-full-details' => [
            'post' => [
                'tags' => ['КСМР'],
                'summary' => 'Получение полного описание объектов',
                'security' => [
                    [
                        'bearerAuth' => [
                            'read'
                        ],
                    ],
                ],
                'requestBody' => [
                    'content' => [
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/ObjectsDetailsRequest'
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
                                    '$ref' => '#/components/schemas/ObjectFullDetailsResponse'
                                ],
                            ],
                            'application/x-www-form-urlencoded' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/ObjectFullDetailsResponse'
                                ],
                            ],
                        ],
                    ],
                    '400' => [
                        'description' => 'BadRequest',
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
                                            'example' => 'Не правильный параметр "objectIds"',
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
                                            'example' => 'yii\web\BadRequestHttpException',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        '/ksmr/get-object-short-details' => [
            'post' => [
                'tags' => ['КСМР'],
                'summary' => 'Получение краткого описание объектов',
                'security' => [
                    [
                        'bearerAuth' => [
                            'read'
                        ],
                    ],
                ],
                'requestBody' => [
                    'content' => [
                        'application/json' => [
                            'schema' => [
                                '$ref' => '#/components/schemas/ObjectsDetailsRequest'
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
                                    '$ref' => '#/components/schemas/ObjectShortDetailsResponse'
                                ],
                            ],
                            'application/x-www-form-urlencoded' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/ObjectShortDetailsResponse'
                                ],
                            ],
                        ],
                    ],
                    '400' => [
                        'description' => 'BadRequest',
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
                                            'example' => 'Не правильный параметр "objectIds"',
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
                                            'example' => 'yii\web\BadRequestHttpException',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'schemas' => [
        'DetailTaskHeaderResponse' => [
            'description' => 'Модель результата успешное получения информации по объекту',
            'type' => 'object',
            'properties' => [
                'items' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'object',
                        'properties' => [
                            'objectid' => [
                                'type' => 'integer',
                                'example' => '103330',
                            ],
                            'pfm' => [
                                'type' => 'integer',
                                'example' => '3932',
                            ],
                            'adres' => [
                                'type' => 'string',
                                'example' => 'СарО,г.Саратов, Верхняя,17.',
                            ],
                            'commonarea' => [
                                'type' => 'number',
                                'example' => 248.36,
                            ],
                            'areatorgzal' => [
                                'type' => 'integer',
                                'example' => '293',
                            ],
                            'roomcount' => [
                                'type' => 'integer',
                                'example' => '1',
                            ],
                            'ceilingheight' => [
                                'type' => 'integer',
                                'example' => '5',
                            ],
                            'ingener' => [
                                'type' => 'string',
                                'example' => 'Снегирь Кирилл Андреевич',
                            ],
                            'chieforr' => [
                                'type' => 'string',
                                'example' => 'Михеев Андрей Александрович',
                            ],
                            'ofertasmr' => [
                                'type' => 'number',
                                'example' => 1780000.00,
                            ],
                            'orr' => [
                                'type' => 'string',
                                'example' => 'МО',
                            ],
                        ],
                    ],
                ],
                '_links' => [
                    'type' => 'object',
                    'properties' => [
                        'self' => [
                            'type' => 'object',
                            'properties' => [
                                'href' => [
                                    'type' => 'string',
                                    'example' => 'https://komnportal-test.fix-price.ru/api2/v2/ksmr/get-detail-task-header?objectid=103330&page=1',
                                ],
                            ],
                        ],
                        'first' => [
                            'type' => 'object',
                            'properties' => [
                                'href' => [
                                    'type' => 'string',
                                    'example' => 'https://komnportal-test.fix-price.ru/api2/v2/ksmr/get-detail-task-header?objectid=103330&page=1',
                                ],
                            ],
                        ],
                        'last' => [
                            'type' => 'object',
                            'properties' => [
                                'href' => [
                                    'type' => 'string',
                                    'example' => 'https://komnportal-test.fix-price.ru/api2/v2/ksmr/get-detail-task-header?objectid=103330&page=1',
                                ],
                            ],
                        ],
                    ],
                ],
                '_meta' => [
                    'type' => 'object',
                    'properties' => [
                        'totalCount' => [
                            'type' => 'integer',
                            'example' => 1,
                        ],
                        'pageCount' => [
                            'type' => 'integer',
                            'example' => 1,
                        ],
                        'currentPage' => [
                            'type' => 'integer',
                            'example' => 1
                        ],
                        'perPage' => [
                            'type' => 'integer',
                            'example' => 20,
                        ],
                    ],
                ],
            ],
        ],
        'ObjectsEngineerRequest' => [
            'type' => 'object',
            'required' => [
                'engineer',
            ],
            'properties' => [
                'engineer' => [
                    'type' => 'string',
                    'example' => 'KSnegir',
                ],
                'page' => [
                    'type' => 'integer',
                    'example' => 2,
                ],
                'per-page' => [
                    'type' => 'integer',
                    'example' => 25,
                ],
            ],
        ],
        'ObjectsEngineerResponse' => [
            'description' => 'Модель результата успешное получения объектов инженера',
            'type' => 'object',
            'properties' => [
                'items' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'object',
                        'properties' => [
                            'objectid' => [
                                'type' => 'integer',
                                'example' => '103330',
                            ],
                            'type' => [
                                'type' => 'integer',
                                'example' => '3932',
                            ],
                        ],
                    ],
                ],
                '_links' => [
                    'type' => 'object',
                    'properties' => [
                        'self' => [
                            'type' => 'object',
                            'properties' => [
                                'href' => [
                                    'type' => 'string',
                                    'example' => 'https://komnportal-test.fix-price.ru/api2/v2/ksmr/get-objects-engineer?engineer=KSnegir&page=2&per-page=25',
                                ],
                            ],
                        ],
                        'first' => [
                            'type' => 'object',
                            'properties' => [
                                'href' => [
                                    'type' => 'string',
                                    'example' => 'https://komnportal-test.fix-price.ru/api2/v2/ksmr/get-objects-engineer?engineer=KSnegir&page=1&per-page=25',
                                ],
                            ],
                        ],
                        'last' => [
                            'type' => 'object',
                            'properties' => [
                                'href' => [
                                    'type' => 'string',
                                    'example' => 'https://komnportal-test.fix-price.ru/api2/v2/ksmr/get-objects-engineer?engineer=KSnegir&page=3&per-page=25',
                                ],
                            ],
                        ],
                        'prev' => [
                            'type' => 'object',
                            'properties' => [
                                'href' => [
                                    'type' => 'string',
                                    'example' => 'https://komnportal-test.fix-price.ru/api2/v2/ksmr/get-objects-engineer?engineer=KSnegir&page=1&per-page=25',
                                ],
                            ],
                        ],
                        'next' => [
                            'type' => 'object',
                            'properties' => [
                                'href' => [
                                    'type' => 'string',
                                    'example' => 'https://komnportal-test.fix-price.ru/api2/v2/ksmr/get-objects-engineer?engineer=KSnegir&page=3&per-page=25',
                                ],
                            ],
                        ],
                    ],
                ],
                '_meta' => [
                    'type' => 'object',
                    'properties' => [
                        'totalCount' => [
                            'type' => 'integer',
                            'example' => 59,
                        ],
                        'pageCount' => [
                            'type' => 'integer',
                            'example' => 3,
                        ],
                        'currentPage' => [
                            'type' => 'integer',
                            'example' => 2
                        ],
                        'perPage' => [
                            'type' => 'integer',
                            'example' => 25,
                        ],
                    ],
                ],
            ],

        ],
        'ObjectsDetailsRequest' => [
            'description' => 'Запрос на получение деталий объекта, фильтрация работает по всем полям response',
            'type' => 'object',
            'required' => [
                'objectIds',
            ],
            'properties' => [
                'objectIds' => [
                    'description' => 'Массив ID объектов',
                    'type' => 'array',
                    'items' => [
                        'type' => 'integer',
                    ],
                    'example' => [103330,100085,100123],
                ],
                'sort' => [
                    'description' => 'Сортирровка по всем полям Example: -pfm = pfm DESC; pfm = pfm ASC ',
                    'type' => 'string',
                    'example' => 'objectId,pfm'
                ],
                'page' => [
                    'description' => 'Выбор страницы',
                    'type' => 'integer',
                    'example' => 4,
                ],
                'per-page' => [
                    'description' => 'Количество выводимых ответов на странице',
                    'type' => 'integer',
                    'minimum' => 1,
                    'maximum' => 50,
                    'default' => 20,
                    'example' => 30,
                ],
            ],
        ],
        'ObjectFullDetailsResponse' => [
            'description' => 'Модель получение полного описания объекта',
            'type' => 'object',
            'properties' => [
                'items' => [
                    'type' => 'array',
                    'title' => 'Массив объектов',
                    'items' => [
                        'type' => 'object',
                        'properties' => [
                            'objectid' => [
                                'type' => 'integer',
                                'example' => '103330',
                                'description' => 'ID объекта',
                            ],
                            'pfm' => [
                                'type' => 'string',
                                'example' => '3932',
                                'description' => 'ПФМ объекта',
                            ],
                            'address' => [
                                'type' => 'string',
                                'example' => 'ПскО,г.Псков,пр-т Октябрьский,д.37,к.2',
                                'description' => 'Адрес',
                            ],
                            'locality' => [
                                'type' => 'string',
                                'example' => 'Псков',
                                'description' => 'Населенный пункт',
                            ],
                            'commonArea' => [
                                'type' => 'number',
                                'example' => '350.00',
                                'description' => 'Общая площадь, м2',
                            ],
                            'areaTorgZal' => [
                                'type' => 'integer',
                                'example' => '200',
                                'description' => 'Торговая площадь',
                            ],
                            'roomCount' => [
                                'type' => 'integer',
                                'example' => '2',
                                'description' => 'Количество комнат',
                            ],
                            'ceilingHeight' => [
                                'type' => 'integer',
                                'example' => '0',
                                'description' => 'Высота потолка',
                            ],
                            'engineer' => [
                                'type' => 'string',
                                'example' => 'KSnegir',
                                'description' => 'Инженер',
                            ],
                            'chiefOrr' => [
                                'type' => 'string',
                                'example' => 'AMiheev',
                                'description' => 'Начальник ОРР',
                            ],
                            'ofertaSmr' => [
                                'type' => 'number',
                                'example' => '2240000.00',
                                'description' => 'СМР',
                            ],
                            'currency' => [
                                'type' => 'string',
                                'example' => 'руб.',
                                'description' => 'Валюта объекта',
                            ],
                            'orr' => [
                                'type' => 'string',
                                'example' => 'МО',
                                'description' => 'Название Отдела Регионального Развития',
                            ],
                            'distanceFromCenter' => [
                                'type' => 'integer',
                                'example' => '0',
                                'description' => 'Расстояние от центра',
                            ],
                        ],
                    ],
                ],
                '_links' => [
                    'title' => 'Ссылки на страницы',
                    'type' => 'object',
                    'properties' => [
                        'self' => [
                            'type' => 'object',
                            'title' => 'Ссылка на текущию страницу',
                            'properties' => [
                                'href' => [
                                    'type' => 'string',
                                    'example' => 'https://komnportal-test.fix-price.ru/api2/v2/ksmr/get-object-short-details?page=2&per-page=40',
                                ],
                            ],
                        ],
                        'first' => [
                            'type' => 'object',
                            'title' => 'Ссылка на первую страницу',
                            'properties' => [
                                'href' => [
                                    'type' => 'string',
                                    'example' => 'https://komnportal-test.fix-price.ru/api2/v2/ksmr/get-object-short-details?page=1&per-page=40',
                                ],
                            ],
                        ],
                        'last' => [
                            'type' => 'object',
                            'title' => 'Ссылка на последнию страницу',
                            'properties' => [
                                'href' => [
                                    'type' => 'string',
                                    'example' => 'https://komnportal-test.fix-price.ru/api2/v2/ksmr/get-object-short-details?page=23&per-page=40',
                                ],
                            ],
                        ],
                        'prev' => [
                            'type' => 'object',
                            'title' => 'Ссылка на предыдущию страницу',
                            'properties' => [
                                'href' => [
                                    'type' => 'string',
                                    'example' => 'https://komnportal-test.fix-price.ru/api2/v2/ksmr/get-object-short-details?page=1&per-page=40',
                                ],
                            ],
                        ],
                        'next' => [
                            'type' => 'object',
                            'title' => 'Ссылка на следующию страницу',
                            'properties' => [
                                'href' => [
                                    'type' => 'string',
                                    'example' => 'https://komnportal-test.fix-price.ru/api2/v2/ksmr/get-object-short-details?page=3&per-page=40',
                                ],
                            ],
                        ],
                    ],
                ],
                '_meta' => [
                    'type' => 'object',
                    'title' => 'Мета данные',
                    'properties' => [
                        'totalCount' => [
                            'type' => 'integer',
                            'example' => 914,
                            'description' => 'Всего объектов',
                        ],
                        'pageCount' => [
                            'type' => 'integer',
                            'example' => 23,
                            'description' => 'Всего страниц',
                        ],
                        'currentPage' => [
                            'type' => 'integer',
                            'example' => 2,
                            'description' => 'Текущия страница',
                        ],
                        'perPage' => [
                            'type' => 'integer',
                            'example' => 40,
                            'description' => 'Количество объектов на странице',
                        ],
                    ],
                ],
            ],
        ],
        'ObjectShortDetailsResponse' => [
            'description' => 'Модель получение краткого описания объекта',
            'type' => 'object',
            'properties' => [
                'items' => [
                    'type' => 'array',
                    'title' => 'Массив объектов',
                    'items' => [
                        'type' => 'object',
                        'properties' => [
                            'objectid' => [
                                'type' => 'integer',
                                'example' => '103330',
                                'description' => 'ID объекта',
                            ],
                            'pfm' => [
                                'type' => 'string',
                                'example' => '3932',
                                'description' => 'ПФМ объекта',
                            ],
                            'address' => [
                                'type' => 'string',
                                'example' => 'ПскО,г.Псков,пр-т Октябрьский,д.37,к.2',
                                'description' => 'Адрес',
                            ],
                            'locality' => [
                                'type' => 'string',
                                'example' => 'Псков',
                                'description' => 'Населенный пункт',
                            ],
                            'engineer' => [
                                'type' => 'string',
                                'example' => 'KSnegir',
                                'description' => 'Инженер',
                            ],
                        ],
                    ],
                ],
                '_links' => [
                    'title' => 'Ссылки на страницы',
                    'type' => 'object',
                    'properties' => [
                        'self' => [
                            'type' => 'object',
                            'title' => 'Ссылка на текущию страницу',
                            'properties' => [
                                'href' => [
                                    'type' => 'string',
                                    'example' => 'https://komnportal-test.fix-price.ru/api2/v2/ksmr/get-object-short-details?page=2&per-page=40',
                                ],
                            ],
                        ],
                        'first' => [
                            'type' => 'object',
                            'title' => 'Ссылка на первую страницу',
                            'properties' => [
                                'href' => [
                                    'type' => 'string',
                                    'example' => 'https://komnportal-test.fix-price.ru/api2/v2/ksmr/get-object-short-details?page=1&per-page=40',
                                ],
                            ],
                        ],
                        'last' => [
                            'type' => 'object',
                            'title' => 'Ссылка на последнию страницу',
                            'properties' => [
                                'href' => [
                                    'type' => 'string',
                                    'example' => 'https://komnportal-test.fix-price.ru/api2/v2/ksmr/get-object-short-details?page=23&per-page=40',
                                ],
                            ],
                        ],
                        'prev' => [
                            'type' => 'object',
                            'title' => 'Ссылка на предыдущию страницу',
                            'properties' => [
                                'href' => [
                                    'type' => 'string',
                                    'example' => 'https://komnportal-test.fix-price.ru/api2/v2/ksmr/get-object-short-details?page=1&per-page=40',
                                ],
                            ],
                        ],
                        'next' => [
                            'type' => 'object',
                            'title' => 'Ссылка на следующию страницу',
                            'properties' => [
                                'href' => [
                                    'type' => 'string',
                                    'example' => 'https://komnportal-test.fix-price.ru/api2/v2/ksmr/get-object-short-details?page=3&per-page=40',
                                ],
                            ],
                        ],
                    ],
                ],
                '_meta' => [
                    'type' => 'object',
                    'title' => 'Мета данные',
                    'properties' => [
                        'totalCount' => [
                            'type' => 'integer',
                            'example' => 914,
                            'description' => 'Всего объектов',
                        ],
                        'pageCount' => [
                            'type' => 'integer',
                            'example' => 23,
                            'description' => 'Всего страниц',
                        ],
                        'currentPage' => [
                            'type' => 'integer',
                            'example' => 2,
                            'description' => 'Текущия страница',
                        ],
                        'perPage' => [
                            'type' => 'integer',
                            'example' => 40,
                            'description' => 'Количество объектов на странице',
                        ],
                    ],
                ],
            ],
        ],
    ],
];

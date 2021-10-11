<?php

use yii\rest\UrlRule;

return [
    [
        'class' => UrlRule::class,
        'controller' => 'sed/status-object',
        'pluralize' => false,
        'extraPatterns' => [
            'POST contract-uploaded-to-sed' => 'contract-uploaded-to-sed',
            'POST rejected-before-open' => 'rejected-before-open',
            'POST stopped-flow-operations' => 'stopped-flow-operations',
            'POST doc-in-sed-rejected-kru' => 'doc-in-sed-rejected-kru',
            'POST doc-in-contract-was-again-send-approval' => 'doc-in-contract-was-again-send-approval',
            'POST lease-agreement-in-sed-signed-all' => 'lease-agreement-in-sed-signed-all',
            'POST lease-agreement-in-sed-signed-gd' => 'lease-agreement-in-sed-signed-gd',
        ],
    ],
    [
        'class' => UrlRule::class,
        'controller' => 'sed/doc',
        'pluralize' => false,
        'extraPatterns' => [
            'GET index' => 'index',
            'GET generate-json' => 'generate-json',
        ],
    ],

];

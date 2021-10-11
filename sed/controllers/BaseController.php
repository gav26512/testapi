<?php

namespace api\modules\sed\controllers;

use api\modules\sed\handlers\CheckAccessHandler;
use Yii;
use yii\rest\Controller;
use yii\web\Response;

/**
 * BaseController
 */
class BaseController extends Controller
{
    /**
     * @return array
     */
    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
        $behaviors[] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];

        return $behaviors;
    }

    /**
     * Инициализация
     */
    public function init(): void
    {
        parent::init();
        $this->on(Controller::EVENT_BEFORE_ACTION, [CheckAccessHandler::class, 'run']);
    }
}

<?php

namespace api\modules\v2\controllers;

use common\helpers\Env;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Class DocController
 * @package api\modules\v2\controllers
 */
class DocController extends Controller
{
    /**
     * @return array[]
     */
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            return in_array(Env::ENV(), ['DEV', 'TEST']);
                        },
                    ],
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        Yii::$app->response->format = Response::FORMAT_RAW;
        $this->layout = 'swagger';

        return $this->renderContent('');
    }

    /**
     * Генерирует сам yaml файл
     *
     * @return string
     */
    public function actionGenerateJson(): string
    {
        Yii::$app->response->format = Response::FORMAT_RAW;
        $this->layout = '';

        return $this->renderPartial('index');
    }
    
    
}

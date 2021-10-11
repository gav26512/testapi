<?php


namespace api\modules\sed\controllers;

use common\helpers\Env;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Class DocController
 * @package api\modules\sed\controllers
 */
class DocController extends Controller
{
    /**
     * @return array|array[]
     */
    public function behaviors(): array
    {
        Yii::$app->response->format = Response::FORMAT_RAW;

        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            return !Env::isProduction();
                        },
                    ],
                ],
            ],
        ];
    }

    /**
     * Отображение АПИ swagger для СЕД
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $this->layout = 'swagger';

        return $this->renderContent('');
    }

    /**
     * @return string
     */
    public function actionGenerateJson(): string
    {
        Yii::$app->response->format = Response::FORMAT_RAW;
        $this->layout = '';

        return $this->renderPartial('index');
    }
}
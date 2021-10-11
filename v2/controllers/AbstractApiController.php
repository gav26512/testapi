<?php

namespace api\modules\v2\controllers;

use common\helpers\Env;
use filsh\yii2\oauth2server\filters\auth\CompositeAuth;
use filsh\yii2\oauth2server\filters\ErrorToExceptionFilter;
use Yii;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\ContentNegotiator;
use yii\filters\Cors;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;
use yii\web\Response;

/**
 * Abstract controller for the `v2` module
 */
class AbstractApiController extends ActiveController
{
    /**
     * @var string
     */
    public $filterModel = null;

    /**
     * @var array
     */
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        parent::init();
        $this->enableCsrfValidation = false;
        Yii::$app->user->enableSession = false;

    }

    /** @var string[] разрешенные сайты для REST API */
    const CORS_ACCESS = [
        'https://smrsmeta-test.fix-price.ru',
        'https://smrsmeta.fix-price.ru',
        'https://smrsmetaby.fix-price.ru',
        'https://smrsmetakz.fix-price.ru',
        'https://smrsmetala.fix-price.ru',
        'https://smrsmetauz.fix-price.ru',
    ];

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'authenticator' => [
                'class' => CompositeAuth::class,
                'authMethods' => [
                    ['class' => HttpBearerAuth::class],
                    [
                        'class' => QueryParamAuth::class,
                        'tokenParam' => 'accessToken',
                    ],
                ]
            ],
            'exceptionFilter' => [
                'class' => ErrorToExceptionFilter::class,
            ],
            'contentNegotiator' => [
                'class' => ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
            'corsFilter' => [
                'class' => Cors::class,
                'cors' => [
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Allow-Headers' => [
                        'Origin',
                        'Content-Type',
                        'Accept',
                        'Authorization',
                        'Cache-Control',
                        'Pragma',
                        'Referer',
                        'User-Agent',
                        'Accept-Language',
                    ],
                    'Access-Control-Expose-Headers' => [
                        'Cache-Control',
                        'Content-Language',
                        'Content-Length',
                        'Content-Type',
                        'Expires',
                        'Last-Modified',
                        'Pragma',
                        'Authorization',
                        'Content-Disposition',
                    ],
                    'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                    'Access-Control-Allow-Origin' => Env::isProduction() ?
                        self::CORS_ACCESS : [Yii::$app->request->origin],
                    'Origin' => Env::isProduction() ? self::CORS_ACCESS : [Yii::$app->request->origin],
                    'access-control-max-age' => YII_DEBUG ? -1 : 60 * 10,
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public function actions()
    {
        $actions = parent::actions();
        if ($this->filterModel !== null) {
            $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        }

        return $actions;
    }

    /**
     * @return mixed
     */
    public function prepareDataProvider()
    {
        $searchModel = new $this->filterModel;

        return $searchModel->search(Yii::$app->request->queryParams);
    }

    /**
     * @param string $action
     * @param null $model
     * @param array $params
     */
    public function checkAccess($action, $model = null, $params = [])
    {
        if (in_array($action, ['view', 'update', 'delete'])) {
            if ($model->client_id != Yii::$app->user->identity->getId()) {
                throw new ForbiddenHttpException('You can\'t ' . $action . ' this product.');
            }
        }
    }
}

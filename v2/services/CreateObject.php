<?php

namespace api\modules\v2\services;

use api\components\Pagination;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Sort;
use yii\db\Query;

/**
 * Class CreateObject
 * @package api\modules\v2\services
 */
class CreateObject
{
    /** @var RequestParams */
    protected RequestParams $requestParams;

    /**
     * CreateObject constructor.
     */
    public function __construct()
    {
        $this->requestParams = new RequestParams();
    }

    /**
     * @param Query $query
     * @param array $sortAttributes
     * @return object
     * @throws \yii\base\InvalidConfigException
     */
    public function createActiveDataProvider(Query $query, array $sortAttributes = []): object
    {
        return Yii::createObject(
            [
                'class' => ActiveDataProvider::className(),
                'query' => $query,
                'pagination' => [
                    'class' => Pagination::class,
                ],
                'sort' => [
                    'class' => Sort::class,
                    'params' => $this->requestParams->params(),
                    'enableMultiSort' => true,
                    'attributes' => $sortAttributes,
                ],
            ]
        );
    }
}

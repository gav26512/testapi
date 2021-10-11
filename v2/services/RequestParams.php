<?php

namespace api\modules\v2\services;

/**
 * Class RequestParams
 * @package api\modules\v2\services
 */
class RequestParams
{
    /**
     * @return array
     * @throws \yii\base\InvalidConfigException
     */
    public function params()
    {
        $requestParams = \Yii::$app->getRequest()->getBodyParams();
        if (empty($requestParams)) {
            $requestParams = \Yii::$app->getRequest()->getQueryParams();
        }

        return $requestParams;
    }
}

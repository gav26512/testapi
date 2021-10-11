<?php

namespace api\modules\sed\handlers;

use common\helpers\Env;
use Yii;
use yii\web\ForbiddenHttpException;

/**
 * CheckAccessHandler
 */
class CheckAccessHandler
{
    /**
     * @throws ForbiddenHttpException
     */
    public function run(): void
    {
        $token = Env::apiSedToken();
        $needHeaderValue = "Bearer {$token}";
        $headerValue = Yii::$app->request->headers->get('Authorization');

        if ($needHeaderValue != $headerValue) {
            throw new ForbiddenHttpException("Токен передан неверный");
        }
    }
}

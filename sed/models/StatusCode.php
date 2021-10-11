<?php

namespace api\modules\sed\models;

use yii\web\HttpException;

/**
 * Коды статусов
 */
class StatusCode
{
    public const INVALIDATE_PARAMETERS = 10;

    /**
     * @param $message
     *
     * @return HttpException
     */
    public static function invalidateParameters($message): HttpException
    {
        if (is_array($message)) {
            $message = implode(PHP_EOL, $message);
        }

        return new HttpException(400, $message, StatusCode::INVALIDATE_PARAMETERS);
    }

    public static function resultOk(): array
    {
        return [
            'result' => 'ok',
            'message' => 'Статус присвоен успешно',
        ];
    }
}
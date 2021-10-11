<?php

namespace api\modules\sed\enums;

use yii2mod\enum\helpers\BaseEnum;

class StatusObjectMessageEnum extends BaseEnum
{
    /** @var int  */
    const MESSAGE_DEFAULT = 0;
    /** @var int  */
    const MESSAGE_STATUS_SIGN_CONTRACT_IN_SED = 1;

    /**
     * @var string[]
     */
    protected static $list = [
        self::MESSAGE_DEFAULT => 'Статус установлен автоматически через СЭД',
        self::MESSAGE_STATUS_SIGN_CONTRACT_IN_SED => 'Статус установлен автоматически через СЭД. Договор подписан с помощью ЭЦП',
    ];
}
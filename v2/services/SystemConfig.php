<?php

namespace api\modules\v2\services;

use yii\db\Query;

/**
 * Class SystemConfig
 * @package api\modules\v2\services
 */
class SystemConfig
{
    /**
     * @param string $configName
     * @return string|null
     */
    public function getValue(string $configName): ?string
    {
        $configName = (new Query())
            ->select(['value'])
            ->from('cssystemconfig')
            ->where(['configname' => $configName])
            ->scalar();

        return $configName['value'] ?? null;
    }
}

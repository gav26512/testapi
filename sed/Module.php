<?php

namespace api\modules\sed;

use Yii;
use yii\base\Module as BaseModule;

/**
 * Module
 */
class Module extends BaseModule
{
    /* string $controllerNamespace */
    public $controllerNamespace = 'api\modules\sed\controllers';

    /**
     * Инициализация
     */
    public function init()
    {
        parent::init();
        Yii::configure($this, require __DIR__ . '/config/main.php');
    }
}
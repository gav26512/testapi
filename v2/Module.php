<?php

namespace api\modules\v2;

use Yii;
use yii\base\Module as BaseModule;

/**
 * v2 module definition class
 */
class Module extends BaseModule
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'api\modules\v2\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
    }
}

<?php

namespace api\modules\v2\controllers;

use filsh\yii2\oauth2server\Module;
use yii\base\Controller;
use Yii;

/**
 * SiteController
 */
class SiteController extends Controller
{
    /**
     * @return array
     * @throws \yii\base\InvalidConfigException
     */
    public function actionAuthorize()
    {
        if (Yii::$app->getUser()->getIsGuest()) {
            return $this->redirect('login');
        }

        /** @var $module Module */
        $module = Yii::$app->getModule('oauth2');

        /** @var object $response \OAuth2\Response */
        $response = $module->getServer()->handleAuthorizeRequest(null, null, !Yii::$app->getUser()->getIsGuest(), Yii::$app->getUser()->getId());

        return $response->getParameters();
    }
}

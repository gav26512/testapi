<?php

namespace api\modules\sed\controllers;

use api\modules\sed\forms\SetStatusObjectForm;
use api\modules\sed\forms\SetStatusObjectSignedAllForm;
use api\modules\sed\models\StatusCode;
use api\modules\sed\services\StatusObjectService;
use common\models\status\StatusInterface;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\HttpException;

/**
 * Class StatusObjectController
 * @package api\modules\sed\controllers
 */
class StatusObjectController extends BaseController
{
    /** @var StatusObjectService  */
    private StatusObjectService $statusObjectService;
    /** @var SetStatusObjectForm  */
    private SetStatusObjectForm $setStatusObjectForm;
    /** @var SetStatusObjectSignedAllForm  */
    private SetStatusObjectSignedAllForm $setStatusObjectSignedAllForm;

    /**
     * StatusObjectController constructor.
     * @param $id
     * @param $module
     * @param StatusObjectService $statusObjectService
     * @param SetStatusObjectForm $setStatusObjectForm
     * @param SetStatusObjectSignedAllForm $setStatusObjectSignedAllForm
     * @param array $config
     */
    public function __construct(
        $id,
        $module,
        StatusObjectService $statusObjectService,
        SetStatusObjectForm $setStatusObjectForm,
        SetStatusObjectSignedAllForm $setStatusObjectSignedAllForm,
        $config = []
    )
    {
        parent::__construct($id, $module, $config);
        $this->statusObjectService = $statusObjectService;
        $this->setStatusObjectForm = $setStatusObjectForm;
        $this->setStatusObjectSignedAllForm = $setStatusObjectSignedAllForm;
    }

    /**
     * @return array
     */
    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'actions' => [
                                'contract-uploaded-to-sed',
                                'rejected-before-open',
                                'stopped-flow-operations',
                                'doc-in-sed-rejected-kru',
                                'doc-in-contract-was-again-send-approval',
                                'lease-agreement-in-sed-signed-all',
                                'lease-agreement-in-sed-signed-gd',
                            ],
                            'allow' => true,
                        ]
                    ]
                ]
            ]
        );
    }

    /**
     * Метод на запись статуса: Договор загружен в СЭД (215)
     *
     * @return array|string[]|HttpException
     * @throws HttpException
     */
    public function actionContractUploadedToSed()
    {
        if ($this->setStatusObjectForm->load(Yii::$app->request->post(), '') &&
            !$this->setStatusObjectForm->validate()) {
            throw StatusCode::invalidateParameters($this->setStatusObjectForm->getFirstErrors());
        }

        $this->statusObjectService->saveStatusObject(
            $this->setStatusObjectForm->objectId,
            $this->setStatusObjectForm->datetime,
            StatusInterface::CONTRACT_UPLOADED_TO_SED
        );

        return StatusCode::resultOk();
    }

    /**
     * Метод на запись статуса Отказ до открытия (216)
     *
     * @return array|string[]|HttpException
     * @throws HttpException
     */
    public function actionRejectedBeforeOpen()
    {
        if ($this->setStatusObjectForm->load(Yii::$app->request->post(), '') &&
            !$this->setStatusObjectForm->validate()) {
            throw StatusCode::invalidateParameters($this->setStatusObjectForm->getFirstError());
        }

        $this->statusObjectService->saveStatusObject(
            $this->setStatusObjectForm->objectId,
            $this->setStatusObjectForm->datetime,
            StatusInterface::REJECTED_BEFORE_OPEN
        );

        return StatusCode::resultOk();
    }

    /**
     * Метод на запись статуса Остановлен поток операций (217)
     *
     * @return array|string[]|HttpException
     * @throws HttpException
     */
    public function actionStoppedFlowOperations()
    {
        if ($this->setStatusObjectForm->load(Yii::$app->request->post(), '') &&
            !$this->setStatusObjectForm->validate()) {
            throw StatusCode::invalidateParameters($this->setStatusObjectForm->getFirstError());
        }

        $this->statusObjectService->saveStatusObject(
            $this->setStatusObjectForm->objectId,
            $this->setStatusObjectForm->datetime,
            StatusInterface::STOPPED_FLOW_OPERATIONS
        );

        return StatusCode::resultOk();
    }

    /**
     * Метод на запись статуса Отклонено КРУ (Подписание документов) (218)
     *
     * @return array|string[]|HttpException
     * @throws HttpException
     */
    public function actionDocInSedRejectedKru()
    {
        if ($this->setStatusObjectForm->load(Yii::$app->request->post(), '') &&
            !$this->setStatusObjectForm->validate()) {
            throw StatusCode::invalidateParameters($this->setStatusObjectForm->getFirstError());
        }

        $this->statusObjectService->saveStatusObject(
            $this->setStatusObjectForm->objectId,
            $this->setStatusObjectForm->datetime,
            StatusInterface::DOC_IN_SED_REJECTED_KRU
        );

        return StatusCode::resultOk();
    }

    /**
     * Метод на запись статуса Договор повторно отправлен на согласование (Подписание документов) (228)
     *
     * @return array|string[]|HttpException
     * @throws HttpException
     */
    public function actionDocInContractWasAgainSendApproval()
    {
        if ($this->setStatusObjectForm->load(Yii::$app->request->post(), '') &&
            !$this->setStatusObjectForm->validate()) {
            throw StatusCode::invalidateParameters($this->setStatusObjectForm->getFirstError());
        }

        $this->statusObjectService->saveStatusObject(
            $this->setStatusObjectForm->objectId,
            $this->setStatusObjectForm->datetime,
            StatusInterface::DOC_IN_CONTRACT_WAS_AGAIN_SENT_APPROVAL
        );

        return StatusCode::resultOk();
    }

    /**
     * Метод на запись статуса Договор аренды в СЭД подписан с обеих сторон (235)
     *
     * @return array|string[]
     * @throws HttpException
     */
    public function actionLeaseAgreementInSedSignedAll()
    {
        if ($this->setStatusObjectSignedAllForm->load(Yii::$app->request->post(), '') &&
            !$this->setStatusObjectSignedAllForm->validate()) {
            throw StatusCode::invalidateParameters($this->setStatusObjectSignedAllForm->getFirstError());
        }

        $this->statusObjectService->saveStatusObject(
            $this->setStatusObjectSignedAllForm->objectId,
            $this->setStatusObjectSignedAllForm->datetime,
            StatusInterface::LEASE_AGREEMENT_IN_SED_SIGNED_ALL,
            $this->setStatusObjectSignedAllForm->levelMessage
        );

        return StatusCode::resultOk();
    }

    /**
     * Метод на запись статуса Договор аренды в СЭД подписан ГД (236)
     *
     * @return array|string[]
     * @throws HttpException
     */
    public function actionLeaseAgreementInSedSignedGd()
    {
        if ($this->setStatusObjectForm->load(Yii::$app->request->post(), '') &&
            !$this->setStatusObjectForm->validate()) {
            throw StatusCode::invalidateParameters($this->setStatusObjectForm->getFirstError());
        }

        $this->statusObjectService->saveStatusObject(
            $this->setStatusObjectForm->objectId,
            $this->setStatusObjectForm->datetime,
            StatusInterface::LEASE_AGREEMENT_IN_SED_SIGNED_GD
        );

        return StatusCode::resultOk();
    }
}

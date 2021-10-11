<?php

namespace api\modules\sed\services;

use api\modules\sed\enums\StatusObjectMessageEnum;
use common\components\EmailNotifier;
use common\models\Obj;
use common\models\status\StatusInterface;
use common\models\user\UserInterface;
use common\repositories\object\ObjectRepository;
use common\repositories\status\StatusObjectRepository;

/**
 * Class StatusObjectService
 * @package api\modules\sed\services
 */
class StatusObjectService
{
    /** @var StatusObjectRepository */
    private StatusObjectRepository $statusObjectRepository;
    /** @var EmailNotifier  */
    private EmailNotifier $emailNotifier;
    /** @var ObjectRepository  */
    private ObjectRepository $objectRepository;

    /**
     * StatusObjectService constructor.
     * @param StatusObjectRepository $statusObjectRepository
     * @param EmailNotifier $emailNotifier
     * @param ObjectRepository $objectRepository
     */
    public function __construct(
        StatusObjectRepository $statusObjectRepository,
        EmailNotifier $emailNotifier,
        ObjectRepository $objectRepository
    )
    {
        $this->statusObjectRepository = $statusObjectRepository;
        $this->emailNotifier = $emailNotifier;
        $this->objectRepository = $objectRepository;
    }

    /**
     * @param int $objectId
     * @param string $datetime
     * @param int $statusId
     * @param int $levelMessage
     */
    public function saveStatusObject(
        int $objectId,
        string $datetime,
        int $statusId,
        int $levelMessage = StatusObjectMessageEnum::MESSAGE_DEFAULT
    ): void
    {
        if (!$this->statusObjectRepository->checkStatus($objectId, $statusId)) {

            $this->statusObjectRepository->create(
                $statusId,
                $objectId,
                UserInterface::ADMINISTRATOR_USER_ID,
                $datetime,
                StatusObjectMessageEnum::getLabel($levelMessage)
            );

            if ($statusId == StatusInterface::REJECTED_BEFORE_OPEN ){
                $this->sendEmailsRejectedBeforeOpen($objectId);
            }

        }
    }

    /**
     * Подготовка данных для отправки почты по статусу "Отказ до открытия"
     * @param int $objectId
     */
    private function sendEmailsRejectedBeforeOpen(int $objectId): void
    {
        $emails = $this->statusObjectRepository->recipientsEmailsRejectedBeforeOpen($objectId);
        $object = $this->objectRepository->findByObjectId($objectId);

        $this->emailNotifier->sendMailRejectedBeforeOpen($emails, $object);
    }
}
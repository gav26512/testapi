<?php

namespace api\modules\v2\ksmr\controllers;

use api\components\SortAttributes;
use api\modules\v2\controllers\AbstractApiController;
use api\modules\v2\ksmr\models\filters\ObjectFullDetailsFilter;
use api\modules\v2\ksmr\models\filters\ObjectShortDetailsFilter;
use api\modules\v2\ksmr\models\forms\ObjectFullDetailsForm;
use api\modules\v2\ksmr\models\forms\ObjectShortDetailsForm;
use api\modules\v2\ksmr\models\queries\DetailTaskHeaderQuery;
use api\modules\v2\ksmr\models\queries\ObjectFullDetailsQuery;
use api\modules\v2\ksmr\models\queries\ObjectsEngineerQuery;
use api\modules\v2\ksmr\models\queries\ObjectShortDetailsQuery;
use api\modules\v2\services\CreateObject;
use api\modules\v2\services\RequestParams;
use common\forms\object\ObjectIdsForm;
use common\models\Obj;
use common\models\User;
use Yii;
use yii\base\DynamicModel;
use yii\web\BadRequestHttpException;
use yii\web\MethodNotAllowedHttpException;

/**
 * Class KsmrController
 * @package api\modules\v2\ksmr\controllers
 */
class KsmrController extends AbstractApiController
{
    /** @var DetailTaskHeaderQuery */
    private DetailTaskHeaderQuery $detailTaskHeader;

    /** @var CreateObject */
    private CreateObject $createResponse;

    /** @var ObjectsEngineerQuery */
    private ObjectsEngineerQuery $objectsEngineer;

    /** @var ObjectShortDetailsQuery */
    private ObjectShortDetailsQuery $objectShortDetails;

    /** @var ObjectFullDetailsQuery */
    private ObjectFullDetailsQuery $objectFullDetails;

    /** @var RequestParams */
    public requestParams $requestParam;


    /** @var string */
    public $modelClass = Obj::class;

    /**
     * @param $id
     * @param $module
     * @param array $config
     */
    public function __construct(
        $id,
        $module,
        DetailTaskHeaderQuery $detailTaskHeader,
        CreateObject $createObject,
        ObjectsEngineerQuery $objectsEngineer,
        RequestParams $requestParams,
        ObjectShortDetailsQuery $objectShortDetailsQuery,
        ObjectFullDetailsQuery $objectFullDetailsQuery,
        $config = []
    ) {
        $this->detailTaskHeader = $detailTaskHeader;
        $this->createResponse = $createObject;
        $this->objectsEngineer = $objectsEngineer;
        $this->requestParam = $requestParams;
        $this->objectShortDetails = $objectShortDetailsQuery;
        $this->objectFullDetails = $objectFullDetailsQuery;
        parent::__construct($id, $module, $config);
    }


    /**
     * @param int $objectid
     * @return array|object|string[]|\yii\db\Query[]
     * @throws BadRequestHttpException
     * @throws MethodNotAllowedHttpException
     */
    public function actionGetDetailTaskHeader(int $objectid)
    {
        $model = $this->getModelObjectId();
        if ($model->load(Yii::$app->request->get(), '') && $model->validate()) {
            return $this->createResponse->createActiveDataProvider($this->detailTaskHeader->getQuery($model->objectid));
        }

        throw new BadRequestHttpException(implode('; ', $model->firstErrors));
    }

    /**
     * @return object
     * @throws BadRequestHttpException
     * @throws \yii\base\InvalidConfigException
     */
    public function actionGetObjectsEngineer()
    {
        $model = $this->getModelEngineer();
        if ($model->load(Yii::$app->request->post(), '') && $model->validate()) {
            return $this->createResponse->createActiveDataProvider($this->objectsEngineer->getQuery($model->engineer));
        }

        throw new BadRequestHttpException(implode('; ', $model->firstErrors));
    }

    /**
     * Получение краткого описания объекта
     * @return object
     * @throws BadRequestHttpException
     * @throws \yii\base\InvalidConfigException
     */
    public function actionGetObjectShortDetails()
    {
        $filters = new ObjectShortDetailsForm();
        $filters->load(Yii::$app->request->post(), '');
        if (!$filters->validate()) {
            throw new BadRequestHttpException(implode('; ', $filters->firstErrors));
        }

        return $this->createResponse->createActiveDataProvider(
            $this->objectShortDetails->searchQuery($filters),
            (new SortAttributes())->createFromAttributes($filters->fields())
        );
    }

    /**
     * Получение полного описания объекта
     * @return object
     * @throws BadRequestHttpException
     * @throws \yii\base\InvalidConfigException
     */
    public function actionGetObjectFullDetails()
    {
        $filters = new ObjectFullDetailsForm();
        $filters->load($this->request->post(), '');
        if (!$filters->validate()) {
            throw new BadRequestHttpException(implode('; ', $filters->firstErrors));
        }

        return $this->createResponse->createActiveDataProvider(
            $this->objectFullDetails->searchQuery($filters),
            (new SortAttributes())->createFromAttributes($filters->fields())
        );
    }

    /**
     * @return array|string[][]
     */
    protected function verbs()
    {
        return [
            'getDetailTaskHeader' => ['GET', 'OPTIONS'],
            'getObjectsEngineer' => ['POST', 'OPTIONS'],
            'getObjectFullDetails' => ['POST', 'OPTIONS'],
            'getObjectShortDetails' => ['POST', 'OPTIONS'],
        ];
    }

    /**
     * @return DynamicModel
     */
    private function getModelObjectId(): DynamicModel
    {
        return (new DynamicModel(['objectid']))
            ->addRule(['objectid'], 'required')
            ->addRule(['objectid'], 'integer')
            ->addRule(['objectid'], 'exist', [
                'skipOnError' => true,
                'targetClass' => Obj::class,
                'targetAttribute' => ['objectid' => 'objectid']
            ]);
    }

    /**
     * @return DynamicModel
     */
    private function getModelEngineer(): DynamicModel
    {
        return (new DynamicModel(['engineer']))
            ->addRule(['engineer'], 'required')
            ->addRule(['engineer'], 'string')
            ->addRule(['engineer'], 'exist', [
                'skipOnError' => true,
                'targetClass' => User::class,
                'targetAttribute' => ['engineer' => 'login']
            ]);
    }
}

<?php

namespace api\modules\v2\ksmr\models\forms;

use yii\base\Model;

/**
 * class api\modules\v2\ksmr\models\forms\ObjectShortDetailsForm
 */
class ObjectShortDetailsForm extends Model
{
    /** @var array */
    public $objectIds;
    /** @var int */
    public $objectId;
    /** @var string */
    public $pfm;
    /** @var string */
    public $address;
    /** @var string */
    public $locality;
    /** @var string */
    public $engineer;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['objectIds'], 'required'],
            [['objectIds'], 'each', 'rule' => ['integer']],
            [['objectId'], 'integer'],
            [['pfm', 'address', 'locality', 'engineer'], 'string'],
        ];
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [
            'objectId' => 'o.objectid',
            'pfm' => 'o.pfm',
            'address' => 'o.adres',
            'locality' => 'o.locality',
            'ingener' => ['ingenerrenov.login', 'ingener.login'],
        ];
    }
}

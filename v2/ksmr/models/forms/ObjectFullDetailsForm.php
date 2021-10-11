<?php

namespace api\modules\v2\ksmr\models\forms;

use yii\base\Model;

/**
 * class api\modules\v2\ksmr\models\forms\ObjectFullDetailsForm
 */
class ObjectFullDetailsForm extends Model
{
    /** @var array  */
    public $objectIds;
    /** @var int */
    public $objectId;
    /** @var string */
    public $pfm;
    /** @var string */
    public $address;
    /** @var string */
    public $locality;
    /** @var int */
    public $commonArea;
    /** @var int */
    public $areaTorgZal;
    /** @var int */
    public $roomCount;
    /** @var int */
    public $ceilingHeight;
    /** @var string */
    public $engineer;
    /** @var string */
    public $chiefOrr;
    /** @var int */
    public $ofertaSmr;
    /** @var string */
    public $currency;
    /** @var string */
    public $orr;
    /** @var int */
    public $distanceFromCenter;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['objectIds'], 'required'],
            [['objectIds'], 'each', 'rule' => ['integer']],
            [
                [
                    'objectId',
                    'commonArea',
                    'areaTorgZal',
                    'roomCount',
                    'ceilingHeight',
                    'ofertaSmr',
                    'distanceFromCenter'
                ],
                'integer'
            ],
            [['pfm', 'address', 'locality', 'engineer', 'chiefOrr', 'currency', 'orr'], 'string'],
        ];
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [
            'objectId' => 'o.objectid',
            'commonArea' => 'of.area',
            'roomCount' => 'p.tradespace',
            'ceilingHeight' => 'p.ceilingheight',
            'ofertaSmr' => 'of.smr',
            'distanceFromCenter' => 'dp.distancefromcenter',
            'pfm' => 'o.pfm',
            'address' => 'o.adres',
            'locality' => 'o.locality',
            'ingener' => ['ingenerrenov.login', 'ingener.login'],
            'chiefOrr' => 'chieforr.login',
            'currency' => 'ovt.currency',
            'orr' => 'orr.orr',
        ];
    }
}

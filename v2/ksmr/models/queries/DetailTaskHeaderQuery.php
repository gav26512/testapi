<?php

namespace api\modules\v2\ksmr\models\queries;

use api\modules\v2\services\SystemConfig;
use yii\db\Query;

/**
 * Class DetailTaskHeaderQuery
 * @package api\modules\v2\ksmr\models\queries
 */
class DetailTaskHeaderQuery
{
    /** @var string */
    const CONFIG_NAME = 'coef_oferta';

    /** @var int */
    const PLACEMENT_TIPE_ID = 1;

    /** @var int  */
    const ACTUAL = 1;

    /** @var int  */
    const SMR = 0;

    /** @var SystemConfig */
    protected SystemConfig $systemConfig;

    /**
     * DetailTaskHeaderQuery constructor.
     */
    public function __construct()
    {
        $this->systemConfig = new SystemConfig();
    }

    /**
     * @param int $objectId
     * @return Query
     */
    public function getQuery(int $objectId): Query
    {
        $coefficientOffer = (int)$this->systemConfig->getValue(self::CONFIG_NAME);

        return (new Query())
            ->select([
                'objectid' => 'o.objectid',
                'pfm' => 'o.pfm',
                'adres' => 'o.adres',
                'commonarea' => 'of.area',
                'areatorgzal' => 'p.tradespace',
                'roomcount' => 'p.roomcount',
                'ceilingheight' => 'p.ceilingheight',
                'ingener' => 'IF(u2.fullname IS NOT NULL, u2.fullname, u.fullname)',
                'chieforr' => 'u3.fullname',
                'ofertasmr' => "`of`.`smr`*{$coefficientOffer}",
                'orr' => 'orr.orr'
            ])
            ->from(['o' => 'object'])
            ->leftJoin(['r' => 'reprezantations'], 'r.objectid = o.objectid')
            ->leftJoin(['p' => 'placements'], 'p.objectid = o.objectid')
            ->leftJoin(['u' => 'user'], 'u.userid = r.ingenerid')
            ->leftJoin(['u2' => 'user'], 'u2.userid = r.ingeneridforrenov')
            ->leftJoin(['u3' => 'user'], 'u3.userid = r.chieforrid')
            ->leftJoin(['of' => 'oferta'],
                'of.objectid = o.objectid AND of.isactual = ' . self::ACTUAL . ' AND of.smr > ' . self::SMR)
            ->innerJoin(['orr1' => 'orrempls'], 'orr1.emplid = r.chieforrid')
            ->innerJoin('orr', 'orr.orrid = orr1.orrid')
            ->andWhere(['o.objectid' => $objectId, 'p.placementtypeid' => self::PLACEMENT_TIPE_ID]);
    }
}

<?php

namespace api\modules\v2\ksmr\models\queries;

use api\modules\v2\ksmr\models\forms\ObjectShortDetailsForm;
use common\enums\OfertaEnum;
use common\enums\PlacementTypeEnum;
use common\models\status\StatusInterface;
use yii\db\Query;

/**
 * class api\modules\v2\ksmr\models\queries\ObjectShortDetailsQuery
 */
class ObjectShortDetailsQuery
{
    /**
     * @param ObjectShortDetailsForm $objectShortDetails
     * @return Query
     */
    public function searchQuery(ObjectShortDetailsForm $objectShortDetails): Query
    {
        $query = (new Query())
            ->select(
                [
                    'objectId' => 'o.objectid',
                    'pfm' => 'o.pfm',
                    'address' => 'o.adres',
                    'locality' => 'o.locality',
                    'engineer' => 'IFNULL(ingenerrenov.login, ingener.login)',
                ]
            )
            ->from(['o' => 'object'])
            ->leftJoin(['r' => 'reprezantations'], 'r.objectid = o.objectid')
            ->leftJoin(['p' => 'placements'], 'p.objectid = o.objectid')
            ->leftJoin(['ingener' => 'user'], 'ingener.userid = r.ingenerid')
            ->leftJoin(['ingenerrenov' => 'user'], 'ingenerrenov.userid = r.ingeneridforrenov')
            ->leftJoin(['chieforr' => 'user'], 'chieforr.userid = r.chieforrid')
            ->leftJoin(
                ['of' => 'oferta'],
                'of.objectid = o.objectid AND of.isactual = ' . OfertaEnum::ACTUAL_OFERTA . ' AND of.smr > 0'
            )
            ->leftJoin(['so' => 'statusobject'], 'so.statusobjectid = o.laststatusobjectid ')
            ->innerJoin('orrempls', 'orrempls.emplid = r.chieforrid')
            ->innerJoin('orr', 'orr.orrid = orrempls.orrid')
            ->innerJoin(['oot' => 'ofertaobjecttemplateid'], 'oot.objectid = o.objectid')
            ->innerJoin(['ovt' => 'ofertaversiontemplate'], 'ovt.idversion = oot.idversion')
            ->innerJoin(['dp' => 'developmentpotential'], 'dp.locality = o.locality')
            ->andWhere(['o.objectid' => $objectShortDetails->objectIds])
            ->andWhere('p.placementtypeid = ' . PlacementTypeEnum::PROPOSED_BEFORE_RECONSTRUCTION)
            ->andWhere([
                'NOT IN',
                'so.statusid',
                [
                    StatusInterface::MOVED_TO_ARCHIVE,
                    StatusInterface::CLOSED,
                ]
            ]);

        $query
            ->andFilterWhere(['o.objectid' => $objectShortDetails->objectId])
            ->andFilterWhere(['like', 'o.pfm', $objectShortDetails->pfm])
            ->andFilterWhere(['like', 'o.adres', $objectShortDetails->address])
            ->andFilterWhere(['like', 'o.locality', $objectShortDetails->locality])
            ->andFilterWhere(['like', 'ingenerrenov.login', $objectShortDetails->engineer])
            ->orFilterWhere(['like', 'ingener.login', $objectShortDetails->engineer]);

        return $query;
    }
}

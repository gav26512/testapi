<?php

namespace api\modules\v2\ksmr\models\queries;

use api\modules\v2\ksmr\models\forms\ObjectFullDetailsForm;
use common\enums\OfertaEnum;
use common\enums\PlacementTypeEnum;
use common\models\status\StatusInterface;
use yii\db\Query;

/**
 * class api\modules\v2\ksmr\models\queries\ObjectFullDetailsQuery
 */
class ObjectFullDetailsQuery
{
    /**
     * @param ObjectFullDetailsForm $objectFullDetail
     * @return Query
     */
    public function searchQuery(ObjectFullDetailsForm $objectFullDetail): Query
    {
        $query = (new Query())
            ->select(
                [
                    'objectId' => 'o.objectid',
                    'pfm' => 'o.pfm',
                    'address' => 'o.adres',
                    'locality' => 'o.locality',
                    'commonArea' => 'of.area',
                    'areaTorgZal' => 'p.tradespace',
                    'roomCount' => 'p.roomcount',
                    'ceilingHeight' => 'p.ceilingheight',
                    'engineer' => 'IFNULL(ingenerrenov.login, ingener.login)',
                    'chiefOrr' => 'chieforr.login',
                    'ofertaSmr' => 'of.smr',
                    'currency' => 'ovt.currency',
                    'orr' => 'orr.orr',
                    'distanceFromCenter' => 'dp.distancefromcenter',
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
            ->andWhere(['o.objectid' => $objectFullDetail->objectIds])
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
            ->andFilterWhere(['o.objectid' => $objectFullDetail->objectId])
            ->andFilterWhere(['of.area' => $objectFullDetail->commonArea])
            ->andFilterWhere(['p.tradespace' => $objectFullDetail->areaTorgZal])
            ->andFilterWhere(['p.roomcount' => $objectFullDetail->roomCount])
            ->andFilterWhere(['p.ceilingheight' => $objectFullDetail->ceilingHeight])
            ->andFilterWhere(['of.smr' => $objectFullDetail->ofertaSmr])
            ->andFilterWhere(['dp.distancefromcenter' => $objectFullDetail->distanceFromCenter])
            ->andFilterWhere(['like', 'o.pfm', $objectFullDetail->pfm])
            ->andFilterWhere(['like', 'o.adres', $objectFullDetail->address])
            ->andFilterWhere(['like', 'o.locality', $objectFullDetail->locality])
            ->andFilterWhere(['like', 'ingenerrenov.login', $objectFullDetail->engineer])
            ->orFilterWhere(['like', 'ingener.login', $objectFullDetail->engineer])
            ->andFilterWhere(['like', 'chieforr.login', $objectFullDetail->chiefOrr])
            ->andFilterWhere(['like', 'ovt.currency', $objectFullDetail->currency])
            ->andFilterWhere(['like', 'orr.orr', $objectFullDetail->orr]);

        return $query;
    }
}

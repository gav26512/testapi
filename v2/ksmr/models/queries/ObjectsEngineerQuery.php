<?php

namespace api\modules\v2\ksmr\models\queries;

use yii\db\Query;

/**
 * Class ObjectsEngineerQuery
 * @package api\modules\v2\ksmr\models\queries
 */
class ObjectsEngineerQuery
{
    /** @var int  */
    const TYPE_CONSTRUCTION = 1;

    /** @var int  */
    const TYPE_RENOVATION = 2;

    const STATUS_CLOSE = 54;

    const STATUS_ARCHIVE = 41;
    /**
     * @param string $login
     * @return Query
     */
    public function getQuery(string $login): Query
    {
        $queryUnion = (new Query())
            ->select('`objectid`, `ingeneridforrenov` AS `ingener`, ' . self::TYPE_RENOVATION. ' AS `type`')
            ->from('reprezantations')
            ->where('ingeneridforrenov <> 0');

        $query = (new Query())
            ->select('`objectid`, `ingenerid` AS `ingener`, ' . self::TYPE_CONSTRUCTION. ' AS `type`')
            ->from('reprezantations')
            ->where('ingenerid <> 0')
            ->union($queryUnion);

        return (new Query())
            ->withQuery($query, 'ingener')
            ->select([
                'objectid' => '`o`.`objectid`',
                'type' => '`r`.`type`',
            ])
            ->from(['o' => 'object'])
            ->leftJoin(['r' => 'ingener'], 'r.objectid = o.objectid')
            ->leftJoin(['so' => 'statusobject'], 'so.statusobjectid = o.laststatusobjectid')
            ->innerJoin(['u' => 'user'], "`u`.`userid`=`r`.`ingener` AND lower(`u`.`login`)=lower('{$login}')")
            ->andWhere('so.statusid NOT IN (' . self::STATUS_ARCHIVE. ',' . self::STATUS_CLOSE. ')');
    }
}

<?php

namespace Pyz\Zed\PlanetStar\Communication\Table;

use Orm\Zed\Planet\Persistence\Map\PyzStarTableMap;
use Orm\Zed\Planet\Persistence\PyzStarQuery;
use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;

class StarTable extends AbstractTable
{
    private PyzStarQuery $starQuery;
    private const PLANETS = 'PLANETS';
    public function __construct(PyzStarQuery $starQuery)
    {
        $this->starQuery = $starQuery;
    }

    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration $config
     * @return TableConfiguration
     */
    protected function configure(TableConfiguration $config): TableConfiguration
    {
        $config->setHeader([
            PyzStarTableMap::COL_NAME => 'Star name',
            PyzStarTableMap::COL_DISTANCE => 'Distance from Sun',
            PyzStarTableMap::COL_MASS_IN_SUNS => 'Mass(in suns)',
            self::PLANETS => 'Orbiting planets'
        ]);
        return $config;
    }
    protected function prepareData(TableConfiguration $config)
    {
//        $starItems = $this->starQuery->find();
//        $this->starQuery->leftJoinPyzPlanet();
//        $starItems = $this->runQuery(
//            $this->starQuery,
//            $config,
//        );
//        $starItems->populateRelation('PyzPlanet');
        $starItems = PyzStarQuery::create()->find();

        $starRows = [];

//        TODO: Fix N plus 1 problem
        foreach ($starItems as $starItem) {
            $row = [];
            $row[PyzStarTableMap::COL_NAME] = $starItem->getName();
            $row[PyzStarTableMap::COL_DISTANCE] = $starItem->getDistance();
            $row[PyzStarTableMap::COL_MASS_IN_SUNS] = $starItem->getMassInSuns();
            $planets = $starItem->getPyzPlanets()->toArray();
            $planetString = "";
            foreach ($planets as $planet) {
                $planetString = $planetString . $planet["Name"] . ", ";
            }
            $row[self::PLANETS] = $planetString;
//            $starItem[self::PLANETS] = json_encode($starItem);
            $starRows[] = $row;
        }
        return $starRows;
    }
}

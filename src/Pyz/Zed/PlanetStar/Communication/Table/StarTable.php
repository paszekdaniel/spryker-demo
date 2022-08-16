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
//TODO: fix fetching data for 1-N
    protected function prepareData(TableConfiguration $config)
    {
        $this->starQuery->with('PyzPlanet');
        $this->starQuery->limit(10);
        $starItems = $this->runQuery(
            $this->starQuery,
            $config
        );
//        $starItems->populateRelation('PyzPlanet');
        $starRows = [];

        foreach ($starItems as $starItem) {
            $starItem[self::PLANETS] = json_encode($starItem);
            $starRows[] = $starItem;
        }
        return $starRows;
    }
}

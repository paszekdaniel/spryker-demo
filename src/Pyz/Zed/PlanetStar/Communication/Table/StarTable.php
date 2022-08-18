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
    private const ACTIONS = 'ACTIONS';
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
            self::PLANETS => 'Orbiting planets',
            self::ACTIONS => 'Actions'
        ]);
        $config->setRawColumns([
            self::ACTIONS
        ]);
        return $config;
    }
    protected function prepareData(TableConfiguration $config)
    {
//        not using config here, because it didn't work with $this->runQuery(..,$config)
        $starItems = $this->starQuery->find();
        $starItems->populateRelation("PyzPlanet");

        $starRows = [];

        foreach ($starItems as $starItem) {
            $row = [];
            $row[PyzStarTableMap::COL_NAME] = $starItem->getName();
            $row[PyzStarTableMap::COL_DISTANCE] = $starItem->getDistance();
            $row[PyzStarTableMap::COL_MASS_IN_SUNS] = $starItem->getMassInSuns();
            $planets = $starItem->getPyzPlanets()->toArray();
            $planets = array_map(fn ($planet) => $planet["Name"],$planets);
            $planetString = implode(', ',$planets);
            $row[self::PLANETS] = $planetString;
            $row[self::ACTIONS] = $this->generateButtonsItem($starItem);
            $starRows[] = $row;
        }
        return $starRows;
    }
    protected function generateButtonsItem($star): string
    {
        $btnGroup = [];
        $btnGroup[] = $this->createButtonGroupItem(
            "Edit",
            "/planet-star/edit?id={$star->getIdStar()}"
        );
        $btnGroup[] = $this->createButtonGroupItem(
            "Delete",
            "/planet-star/delete?id={$star->getIdStar()}"
        );
        return $this->generateButtonGroup(
            $btnGroup,
            'Actions'
        );
    }
}

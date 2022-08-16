<?php

namespace Pyz\Zed\Planet\Communication\Table;

use Orm\Zed\Planet\Persistence\Map\PyzPlanetTableMap;
use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;
use Orm\Zed\Planet\Persistence\PyzPlanetQuery;

class PlanetTable extends AbstractTable
{
    /** @var \Orm\Zed\Planet\Persistence\PyzPlanetQuery */
    private PyzPlanetQuery $planetQuery;
    private const COL_ACTIONS = 'actions';

    /**
     * @param \Orm\Zed\Planet\Persistence\PyzPlanetQuery $planetQuery
     */
    public function __construct(PyzPlanetQuery $planetQuery)
    {
        $this->planetQuery = $planetQuery;
    }

    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration $config
     *
     * @return \Spryker\Zed\Gui\Communication\Table\TableConfiguration
     */
    protected function configure(TableConfiguration $config): TableConfiguration
    {

        $config->setHeader([
            PyzPlanetTableMap::COL_NAME => 'Planet name',
            PyzPlanetTableMap::COL_INTERESTING_FACT => 'Interesting fact',
            PyzPlanetTableMap::COL_NR_FROM_SUN => 'Number from sun',
            PyzPlanetTableMap::COL_VOLUME_IN_EARTHS => 'Volume(in earths)',
            self::COL_ACTIONS => 'Actions'
        ]);

        $config->setSortable([
            PyzPlanetTableMap::COL_NAME,
            PyzPlanetTableMap::COL_INTERESTING_FACT,
            PyzPlanetTableMap::COL_NR_FROM_SUN,
            PyzPlanetTableMap::COL_VOLUME_IN_EARTHS
        ]);

        $config->setSearchable([
            PyzPlanetTableMap::COL_NAME,
            PyzPlanetTableMap::COL_NR_FROM_SUN
        ]);

        $config->setRawColumns([
            self::COL_ACTIONS
        ]);

        return $config;
    }

    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration $config
     *
     * @return array
     */
    protected function prepareData(TableConfiguration $config): array
    {
        $planetItems = $this->runQuery(
            $this->planetQuery,
            $config
        );
        $planetRows = [];

        foreach ($planetItems as $planetItem) {
            $planetItem[self::COL_ACTIONS] = $this->generateItemButtons($planetItem);

            $planetRows[] = $planetItem;
        }
        return $planetRows;
    }
    protected function generateItemButtons($planetItem) {
        $btnGroup = [];
        $btnGroup[] = $this->createButtonGroupItem(
            "Edit",
            "/planet/edit?name={$planetItem[PyzPlanetTableMap::COL_NAME]}"
        );
        $btnGroup[] = $this->createButtonGroupItem(
            "Delete",
            "/planet/delete?name={$planetItem[PyzPlanetTableMap::COL_NAME]}"
        );
        return $this->generateButtonGroup(
            $btnGroup,
            'Actions'
        );
    }

}

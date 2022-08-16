<?php

namespace Pyz\Zed\Planet\Persistence;

use Orm\Zed\Planet\Persistence\PyzPlanetQuery;
use Orm\Zed\Planet\Persistence\PyzStarQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

class PlanetPersistenceFactory extends AbstractPersistenceFactory
{
    public function createPlanetQuery(): PyzPlanetQuery
    {
        return PyzPlanetQuery::create();
    }
    public function createStarQuery(): PyzStarQuery
    {
        return PyzStarQuery::create();
    }
}

<?php

namespace Pyz\Zed\PlanetStar\Persistence;

use Orm\Zed\Planet\Persistence\PyzStarQuery;

class PlanetStarPersistenceFactory
{
    public function createStarQuery(): PyzStarQuery
    {
        return PyzStarQuery::create();
    }
}

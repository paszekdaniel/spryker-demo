<?php

namespace Pyz\Zed\Planet\Persistence;

use Generated\Shared\Transfer\PlanetCollectionTransfer;
use Generated\Shared\Transfer\PlanetTransfer;

interface PlanetRepositoryInterface
{
    public function findPlanetEntityByName(string $name): PlanetTransfer;

    public function fetchAllPlanets(): PlanetCollectionTransfer;
}

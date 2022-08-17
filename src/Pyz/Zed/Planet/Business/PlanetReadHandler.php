<?php

namespace Pyz\Zed\Planet\Business;

use Generated\Shared\Transfer\PlanetCollectionTransfer;
use Generated\Shared\Transfer\PlanetTransfer;
use Pyz\Zed\Planet\Persistence\PlanetRepositoryInterface;

class PlanetReadHandler
{
    protected PlanetRepositoryInterface $repo;

    public function __construct(PlanetRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
    public function findPlanetByName(string $name): PlanetTransfer
    {
        return $this->repo->findPlanetEntityByName($name);
    }
    public function fetchAll(): PlanetCollectionTransfer {
        return $this->repo->fetchAllPlanets();
    }
}

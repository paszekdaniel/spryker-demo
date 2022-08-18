<?php

namespace Pyz\Zed\Planet\Business;

use Generated\Shared\Transfer\PlanetCollectionTransfer;
use Generated\Shared\Transfer\PlanetTransfer;

interface PlanetFacadeInterface
{
    public function createPlanetEntity(PlanetTransfer $dto): ?PlanetTransfer;

    public function updatePlanetEntity(PlanetTransfer $dto): ?PlanetTransfer;

    public function findPlanetByName(string $name): PlanetTransfer;

    public function deletePlanetByName(string $name): bool;

    public function getPlanetsCollection(): PlanetCollectionTransfer;

    public function findPlanetById(int $id): PlanetTransfer;
}

<?php

namespace Pyz\Zed\Planet\Persistence;

use Generated\Shared\Transfer\PlanetTransfer;

interface PlanetEntityManagerInterface
{
    public function savePlanetEntity(PlanetTransfer $dto): PlanetTransfer;
    public function updatePlanetEntity(PlanetTransfer $dto): PlanetTransfer;
}

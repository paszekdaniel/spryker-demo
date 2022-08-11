<?php

namespace Pyz\Zed\Planet\Business;

use Generated\Shared\Transfer\PlanetTransfer;

interface PlanetFacadeInterface
{
    public function createPlanetEntity(PlanetTransfer $dto): PlanetTransfer;

    public function updatePlanetEntity(PlanetTransfer $dto): PlanetTransfer;

}

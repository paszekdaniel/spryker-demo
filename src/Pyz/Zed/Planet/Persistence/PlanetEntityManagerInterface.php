<?php

namespace Pyz\Zed\Planet\Persistence;

use Generated\Shared\Transfer\PlanetTransfer;

interface PlanetEntityManagerInterface
{
    /**
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function savePlanetEntity(PlanetTransfer $dto): PlanetTransfer;
    /**
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function updatePlanetEntity(PlanetTransfer $dto): PlanetTransfer;
}

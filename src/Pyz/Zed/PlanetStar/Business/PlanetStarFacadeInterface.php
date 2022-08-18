<?php

namespace Pyz\Zed\PlanetStar\Business;

use Generated\Shared\Transfer\PyzStarEntityTransfer;

interface PlanetStarFacadeInterface
{
    public function createStar(PyzStarEntityTransfer $transfer): PyzStarEntityTransfer;

    public function deleteStar(PyzStarEntityTransfer $transfer);
}

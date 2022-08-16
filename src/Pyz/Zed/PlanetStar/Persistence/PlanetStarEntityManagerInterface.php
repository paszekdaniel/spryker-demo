<?php

namespace Pyz\Zed\PlanetStar\Persistence;

use Generated\Shared\Transfer\PyzStarEntityTransfer;

interface PlanetStarEntityManagerInterface
{
    public function saveStar(PyzStarEntityTransfer $transfer): PyzStarEntityTransfer;

}

<?php

namespace Pyz\Zed\PlanetStar\Business;

use Generated\Shared\Transfer\PyzStarEntityTransfer;
use Pyz\Zed\PlanetStar\Persistence\PlanetStarEntityManagerInterface;

class PlanetStarWriter
{
    protected PlanetStarEntityManagerInterface $entityManager;

    public function __construct(PlanetStarEntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function createStar(PyzStarEntityTransfer $transfer): PyzStarEntityTransfer {
        return $this->entityManager->saveStar($transfer);
    }
    public function deleteStar(PyzStarEntityTransfer $transfer) {
        return $this->entityManager->deleteStar($transfer);
    }

}

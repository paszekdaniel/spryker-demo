<?php

namespace Pyz\Zed\Planet\Business;


use Generated\Shared\Transfer\PlanetTransfer;
use Pyz\Zed\Planet\Persistence\PlanetEntityManagerInterface;

class PlanetWriteHandler
{
    protected $entityManager;
    public function __construct(PlanetEntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function createPlanetEntity(PlanetTransfer $dto): PlanetTransfer {
        return $this->entityManager->savePlanetEntity($dto);
    }
}

<?php

namespace Pyz\Zed\Planet\Business;


use Generated\Shared\Transfer\PlanetTransfer;
use Propel\Runtime\Exception\PropelException;
use Pyz\Zed\Planet\Persistence\PlanetEntityManagerInterface;

class PlanetWriteHandler
{
    protected PlanetEntityManagerInterface $entityManager;

    public function __construct(PlanetEntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param PlanetTransfer|null $dto
     * @return PlanetTransfer
     */
    public function createPlanetEntity(PlanetTransfer $dto): ?PlanetTransfer
    {
        try {
            return $this->entityManager->savePlanetEntity($dto);
        } catch (PropelException $e) {
            return null;
        }
    }

    /**
     * @param PlanetTransfer $dto
     * @return PlanetTransfer|null
     */
    public function updatePlanetEntity(PlanetTransfer $dto): ?PlanetTransfer
    {

        try {
            return $this->entityManager->savePlanetEntity($dto);
        } catch (PropelException $e) {
            return null;
        }
    }
    public function deletePlanetByName(string $name): bool
    {
        try {
            $this->entityManager->deletePlanetByName($name);
            return true;
        } catch (PropelException $e) {
            return false;
        }
    }
}

<?php

namespace Pyz\Zed\Planet\Business;

use Generated\Shared\Transfer\PlanetCollectionTransfer;
use Generated\Shared\Transfer\PlanetTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method PlanetBusinessFactory getFactory()
 */
class PlanetFacade extends AbstractFacade implements PlanetFacadeInterface
{

    /**
     * @param PlanetTransfer $dto
     * @return PlanetTransfer|null
     */
    public function createPlanetEntity(PlanetTransfer $dto): ?PlanetTransfer
    {
        return $this->getFactory()
            ->getPlanetWriteHandler()->createPlanetEntity($dto);
    }

    public function updatePlanetEntity(PlanetTransfer $dto): ?PlanetTransfer
    {
        return $this->getFactory()->getPlanetWriteHandler()->updatePlanetEntity($dto);
    }
    public function findPlanetByName(string $name): PlanetTransfer {
        return $this->getFactory()->getPlanetReadHandler()->findPlanetByName($name);
    }

    public function deletePlanetByName(string $name): bool
    {
        return $this->getFactory()->getPlanetWriteHandler()->deletePlanetByName($name);
    }
    public function getPlanetsCollection(): PlanetCollectionTransfer {
        return $this->getFactory()->getPlanetReadHandler()->fetchAll();
    }

    public function findPlanetById(int $id): PlanetTransfer
    {
        return $this->getFactory()->getPlanetReadHandler()->findPlanetById($id);
    }

    public function getPlanetsCollectionWithStar(): PlanetCollectionTransfer
    {
        return $this->getFactory()->getPlanetReadHandler()->fetchALlWithStar();
    }

    public function findPlanetWithStarById(int $id): PlanetTransfer
    {
        return $this->getFactory()->getPlanetReadHandler()->findPlanetWithStarById($id);
    }

    public function deletePlanetById(int $id): bool
    {
        return $this->getFactory()->getPlanetWriteHandler()->deletePlanetById($id);
    }
}

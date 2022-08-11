<?php

namespace Pyz\Zed\Planet\Business;

use Generated\Shared\Transfer\PlanetTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method PlanetBusinessFactory getFactory()
 */
class PlanetFacade extends AbstractFacade implements PlanetFacadeInterface
{

    public function createPlanetEntity(PlanetTransfer $dto): PlanetTransfer
    {
        return $this->getFactory()
            ->getPlanetWriteHandler()->createPlanetEntity($dto);
    }

    public function updatePlanetEntity(PlanetTransfer $dto): PlanetTransfer
    {
        // TODO: Implement updatePlanetEntity() method.
    }
}

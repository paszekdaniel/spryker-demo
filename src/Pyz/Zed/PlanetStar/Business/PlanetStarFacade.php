<?php

namespace Pyz\Zed\PlanetStar\Business;

use Generated\Shared\Transfer\PyzStarEntityTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method PlanetStarBusinessFactory getFactory()
 */
class PlanetStarFacade extends AbstractFacade implements PlanetStarFacadeInterface
{

    public function createStar(PyzStarEntityTransfer $transfer): PyzStarEntityTransfer
    {
        return $this->getFactory()->getStarWriter()->createStar($transfer);
    }
    public function deleteStar(PyzStarEntityTransfer $transfer)
    {
        return $this->getFactory()->getStarWriter()->deleteStar($transfer);
    }
}

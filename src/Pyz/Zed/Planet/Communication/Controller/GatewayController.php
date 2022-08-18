<?php

namespace Pyz\Zed\Planet\Communication\Controller;

use Generated\Shared\Transfer\PlanetCollectionTransfer;
use Generated\Shared\Transfer\PlanetTransfer;
use Pyz\Zed\Planet\Business\PlanetFacadeInterface;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

/**
 * @method PlanetFacadeInterface getFacade()
 */
class GatewayController extends AbstractGatewayController
{
    public function getPlanetCollectionAction(?PlanetCollectionTransfer $planetCollectionTransfer): PlanetCollectionTransfer {
        return $this->getFacade()->getPlanetsCollection();
    }
    public function getPlanetByIdAction(PlanetTransfer $transfer): PlanetTransfer {
        return $this->getFacade()->findPlanetById($transfer->getIdPlanet());
    }
}

<?php

namespace Pyz\Zed\Planet\Communication\Controller;

use Generated\Shared\Transfer\PlanetCollectionTransfer;
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
}

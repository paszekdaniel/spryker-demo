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
    public function getPlanetCollectionWithStarAction(?PlanetCollectionTransfer $planetCollectionTransfer): PlanetCollectionTransfer {
        return $this->getFacade()->getPlanetsCollectionWithStar();
    }
    public function getPlanetWithStarByIdAction(PlanetTransfer $transfer): PlanetTransfer {
        return $this->getFacade()->findPlanetWithStarById($transfer->getIdPlanet());
    }
    public function deletePlanetByIdAction(PlanetTransfer $transfer): PlanetTransfer {
//        TODO: change transfer somehow? Not giving response right now
         $this->getFacade()->deletePlanetById($transfer->getIdPlanet());
        return $transfer;
    }

    public function postPlanetAction(PlanetTransfer $planetTransfer): PlanetTransfer {
        $result = $this->getFacade()->createPlanetEntity($planetTransfer);
        if(!$result) {
            $result = new PlanetTransfer();
        }
        return $result;
    }

    public function updatePlanetAction(PlanetTransfer $planetTransfer): PlanetTransfer {
        return $this->getFacade()->updatePlanetEntity($planetTransfer);
    }
}

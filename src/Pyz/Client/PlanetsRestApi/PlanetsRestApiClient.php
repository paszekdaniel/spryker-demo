<?php

namespace Pyz\Client\PlanetsRestApi;

use Generated\Shared\Transfer\PlanetCollectionTransfer;
use Generated\Shared\Transfer\PlanetTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\PlanetsRestApi\PlanetsRestApiFactory getFactory()
 */
class PlanetsRestApiClient extends AbstractClient implements PlanetsRestApiClientInterface
{
    /**
     * @api
     * @return \Generated\Shared\Transfer\PlanetCollectionTransfer
     */
    public function getPlanetCollection(PlanetCollectionTransfer $planetCollectionTransfer): PlanetCollectionTransfer
    {
        return $this->getFactory()
            ->createPlanetZedStub()
            ->getPlanetCollection($planetCollectionTransfer);
    }

    /**
     * @api
     * @param PlanetTransfer $planetTransfer
     * @return PlanetTransfer
     */
    public function getPlanetById(PlanetTransfer $planetTransfer): PlanetTransfer {
        return $this->getFactory()
            ->createPlanetZedStub()
            ->getPlanetById($planetTransfer);
    }
}

<?php

namespace Pyz\Client\PlanetsRestApi\Zed;

use Generated\Shared\Transfer\PlanetCollectionTransfer;
use Generated\Shared\Transfer\PlanetTransfer;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;

class PlanetsRestApiZedStub implements PlanetsRestApiZedStubInterface
{
    /**
     * @var \Spryker\Client\ZedRequest\ZedRequestClientInterface
     */
    protected $zedRequestClient;

    /**
     * @param \Spryker\Client\ZedRequest\ZedRequestClientInterface $zedRequestClient
     */
    public function __construct(ZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    /**
     * @return \Generated\Shared\Transfer\PlanetCollectionTransfer
     */
    public function getPlanetCollection(PlanetCollectionTransfer $planetCollectionTransfer): PlanetCollectionTransfer
    {
        /** @var \Generated\Shared\Transfer\PlanetCollectionTransfer $planetCollectionTransfer */
        $planetCollectionTransfer = $this->zedRequestClient->call('/planet/gateway/get-planet-collection', $planetCollectionTransfer);

        return $planetCollectionTransfer;
    }

    public function getPlanetById(PlanetTransfer $planetTransfer): PlanetTransfer
    {
        /**
         * @var PlanetTransfer $planetTransfer
         */
        $planetTransfer = $this->zedRequestClient->call("/planet/gateway/get-planet-by-id", $planetTransfer);

        return $planetTransfer;
    }

    public function getPlanetCollectionWithStar(PlanetCollectionTransfer $planetCollectionTransfer): PlanetCollectionTransfer
    {
        /** @var \Generated\Shared\Transfer\PlanetCollectionTransfer $planetCollectionTransfer */
        $planetCollectionTransfer = $this->zedRequestClient->call('/planet/gateway/get-planet-collection-with-star', $planetCollectionTransfer);

        return $planetCollectionTransfer;
    }

    public function getPlanetWithStarById(PlanetTransfer $planetTransfer): PlanetTransfer
    {
        /**
         * @var \Generated\Shared\Transfer\PlanetTransfer $planetTransfer
         */
        $planetTransfer = $this->zedRequestClient->call('/planet/gateway/get-planet-with-star-by-id', $planetTransfer);

        return $planetTransfer;
    }

    public function deletePlanetById(PlanetTransfer $planetTransfer): PlanetTransfer
    {
        /**
         * @var \Generated\Shared\Transfer\PlanetTransfer $planetTransfer
         */
        $planetTransfer = $this->zedRequestClient->call('/planet/gateway/delete-planet-by-id', $planetTransfer);

        return $planetTransfer;
    }

    public function postPlanet(PlanetTransfer $planetTransfer): PlanetTransfer
    {
        /**
         * @var \Generated\Shared\Transfer\PlanetTransfer $planetTransfer
         */
        $planetTransfer = $this->zedRequestClient->call('/planet/gateway/post-planet', $planetTransfer);

        return $planetTransfer;
    }

    public function updatePlanet(PlanetTransfer $planetTransfer): PlanetTransfer
    {
        /**
         * @var \Generated\Shared\Transfer\PlanetTransfer $planetTransfer
         */
        $planetTransfer = $this->zedRequestClient->call('/planet/gateway/update-planet', $planetTransfer);
        return $planetTransfer;
    }
}

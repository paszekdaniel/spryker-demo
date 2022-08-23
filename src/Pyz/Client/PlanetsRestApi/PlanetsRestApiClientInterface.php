<?php

namespace Pyz\Client\PlanetsRestApi;

use Generated\Shared\Transfer\PlanetCollectionTransfer;
use Generated\Shared\Transfer\PlanetTransfer;

interface PlanetsRestApiClientInterface
{
    /**
     * @api
     * @return \Generated\Shared\Transfer\RestPlanetsResponseAttributesTransfer
     */
    public function getPlanetCollection(PlanetCollectionTransfer $planetCollectionTransfer): PlanetCollectionTransfer;

    /**
     * @api
     * @return PlanetTransfer
     */
    public function getPlanetById(PlanetTransfer $planetTransfer): PlanetTransfer;

    /**
     * @api
     * @return \Generated\Shared\Transfer\PlanetCollectionTransfer
     */
    public function getPlanetCollectionWithStar(PlanetCollectionTransfer $planetCollectionTransfer): PlanetCollectionTransfer;

    /**
     * @api
     * @return PlanetTransfer
     */
    public function getPlanetWithStarById(PlanetTransfer $planetTransfer): PlanetTransfer;

    /**
     * @api
     * @return PlanetTransfer
     */
    public function deletePlanetById(PlanetTransfer $planetTransfer): PlanetTransfer;

    /**
     * @api
     * @return PlanetTransfer
     */
    public function postPlanet(PlanetTransfer $planetTransfer): PlanetTransfer;

}


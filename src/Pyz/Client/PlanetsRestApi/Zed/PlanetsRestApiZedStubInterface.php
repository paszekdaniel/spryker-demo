<?php

namespace Pyz\Client\PlanetsRestApi\Zed;

use Generated\Shared\Transfer\PlanetCollectionTransfer;
use Generated\Shared\Transfer\PlanetTransfer;

interface PlanetsRestApiZedStubInterface
{
    public function getPlanetCollection(PlanetCollectionTransfer $planetCollectionTransfer): PlanetCollectionTransfer;

    public function getPlanetById(PlanetTransfer $planetTransfer): PlanetTransfer;

    public function getPlanetCollectionWithStar(PlanetCollectionTransfer $planetCollectionTransfer): PlanetCollectionTransfer;

    public function getPlanetWithStarById(PlanetTransfer $planetTransfer): PlanetTransfer;

    public function deletePlanetById(PlanetTransfer $planetTransfer): PlanetTransfer;

}

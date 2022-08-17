<?php

namespace Pyz\Glue\PlanetsRestApi\Processor\Mapper;

use Generated\Shared\Transfer\RestPlanetsResponseAttributesTransfer;

class PlanetsResourceMapper implements PlanetsResourceMapperInterface
{

    public function mapPlanetDataToPlanetRestAttributes(array $planetData): RestPlanetsResponseAttributesTransfer
    {
        $restPlanetAttributesTransfer = (new RestPlanetsResponseAttributesTransfer())->fromArray($planetData, true);
        return $restPlanetAttributesTransfer;
    }
}

<?php

namespace Pyz\Glue\PlanetsRestApi\Processor\Mapper;

use Generated\Shared\Transfer\RestPlanetsResponseAttributesTransfer;

class PlanetsResourceMapper implements PlanetsResourceMapperInterface
{

    public function mapPlanetDataToPlanetRestAttributes(array $planetData): RestPlanetsResponseAttributesTransfer
    {
//        try some better mapping to make star = null, not object with all null properties
//        try {
//            $planetData["star"]["idStar"]
//        } catch (\Exception $e) {
//
//        }
        $restPlanetAttributesTransfer = (new RestPlanetsResponseAttributesTransfer())->fromArray($planetData, true);
        return $restPlanetAttributesTransfer;
    }
}

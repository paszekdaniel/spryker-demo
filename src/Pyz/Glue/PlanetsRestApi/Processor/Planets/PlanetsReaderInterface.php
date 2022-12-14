<?php

namespace Pyz\Glue\PlanetsRestApi\Processor\Planets;

use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

interface PlanetsReaderInterface
{
    /**
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function getPlanets(RestRequestInterface $restRequest): RestResponseInterface;

    public function getPlanetById(RestRequestInterface $restRequest): RestResponseInterface;

    public function getPlanetsWithStar(RestRequestInterface $restRequest): RestResponseInterface;

    public function getPlanetWithStarById(RestRequestInterface $restRequest): RestResponseInterface;

    public function deletePlanetById(RestRequestInterface $restRequest): RestResponseInterface;

    public function postPlanet(RestRequestInterface $restRequest): RestResponseInterface;

    public function updatePlanet(RestRequestInterface $restRequest): RestResponseInterface;

}

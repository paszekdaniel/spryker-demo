<?php

namespace Pyz\Glue\PlanetsRestApi\Controller;

use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;
use Spryker\Glue\Kernel\Controller\AbstractController;

/**
 * @method \Pyz\Glue\PlanetsRestApi\PlanetsRestApiFactory getFactory()
 */
class PlanetsResourceController extends AbstractController
{
    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function getAction(RestRequestInterface $restRequest): RestResponseInterface
    {
        if (!$restRequest->getResource()->getId()) {
            return $this->getFactory()
                ->createPlanetsReader()
                ->getPlanets($restRequest);
        }
        return $this->getFactory()
            ->createPlanetsReader()
            ->getPlanetById($restRequest);
    }

    public function deleteAction(RestRequestInterface $restRequest): RestResponseInterface
    {
        return $this->getFactory()->createPlanetsReader()->deletePlanetById($restRequest);
    }
    /**
     * path: /planets
     * data: {
     *  "type": "planets",
     *  "attributes": {
     *      "name": "hehe",
     *      "interestingFact": "asda"
     * ...
     * }
    public function postAction(RestRequestInterface $restRequest): RestResponseInterface
    {
        return $this->getFactory()->createPlanetsReader()->postPlanet($restRequest);
    }

    /**
     * path: /planets/id
     * data: {
     *  "type": "planets",
     *  "attributes": {
     *      "name": "hehe",
     *      "interestingFact": "asda"
     * ...
     * }
     * @param RestRequestInterface $restRequest
     * @return RestResponseInterface
     */
    public function patchAction(RestRequestInterface $restRequest): RestResponseInterface
    {
        return $this->getFactory()->createPlanetsReader()->updatePlanet($restRequest);
    }


}

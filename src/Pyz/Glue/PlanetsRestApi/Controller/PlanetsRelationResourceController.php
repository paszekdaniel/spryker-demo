<?php

namespace Pyz\Glue\PlanetsRestApi\Controller;

use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;
use Spryker\Glue\Kernel\Controller\AbstractController;

    /**
     * @method \Pyz\Glue\PlanetsRestApi\PlanetsRestApiFactory getFactory()
     */
class PlanetsRelationResourceController extends AbstractController
{
    /**
     * @param RestRequestInterface $restRequest
     * @return RestResponseInterface
     */
    public function getAction(RestRequestInterface $restRequest): RestResponseInterface {
        if(!$restRequest->getResource()->getId()) {
            return $this->getFactory()->createPlanetsReader()->getPlanetsWithStar($restRequest);
        }
        return $this->getFactory()->createPlanetsReader()->getPlanetWithStarById($restRequest);
    }
}

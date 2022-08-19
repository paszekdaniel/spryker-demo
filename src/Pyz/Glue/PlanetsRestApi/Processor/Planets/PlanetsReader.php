<?php

namespace Pyz\Glue\PlanetsRestApi\Processor\Planets;

use Generated\Shared\Transfer\PlanetCollectionTransfer;
use Generated\Shared\Transfer\PlanetTransfer;
use Pyz\Client\PlanetsRestApi\PlanetsRestApiClientInterface;
use Pyz\Glue\PlanetsRestApi\PlanetsRestApiConfig;
use Pyz\Glue\PlanetsRestApi\Processor\Mapper\PlanetsResourceMapper;
use Pyz\Glue\PlanetsRestApi\Processor\Mapper\PlanetsResourceMapperInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class PlanetsReader implements PlanetsReaderInterface
{
    /** @var \Pyz\Client\PlanetsRestApi\PlanetsRestApiClientInterface */
    private PlanetsRestApiClientInterface $planetsRestApiClient;

    /** @var \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface */
    private RestResourceBuilderInterface $restResourceBuilder;

    /** @var \Pyz\Glue\PlanetsRestApi\Processor\Mapper\PlanetsResourceMapper */
    private PlanetsResourceMapper $planetMapper;

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface $restResourceBuilder
     * @param \Pyz\Glue\PlanetsRestApi\Processor\Mapper\PlanetsResourceMapperInterface $planetMapper
     */
    public function __construct(
        PlanetsRestApiClientInterface $planetsRestApiClient,
        RestResourceBuilderInterface   $restResourceBuilder,
        PlanetsResourceMapperInterface $planetMapper
    )
    {
        $this->planetsRestApiClient = $planetsRestApiClient;
        $this->restResourceBuilder = $restResourceBuilder;
        $this->planetMapper = $planetMapper;
    }

    public function getPlanets(RestRequestInterface $restRequest): RestResponseInterface
    {
        $restResponse = $this->restResourceBuilder->createRestResponse();
        $planetCollectionTransfer = $this->planetsRestApiClient->getPlanetCollection(new PlanetCollectionTransfer());

        foreach ($planetCollectionTransfer->getPlanets() as $planetTransfer) {
            $this->addTransferObjectToResponse($planetTransfer, $restResponse);
        }
        return $restResponse;
    }

    public function getPlanetById(RestRequestInterface $restRequest): RestResponseInterface {
        $planetId = $restRequest->getResource()->getId();
        $restResponse = $this->restResourceBuilder->createRestResponse();

        $planetTransfer = new PlanetTransfer();
        $planetTransfer->setIdPlanet($planetId);
        $planetTransfer = $this->planetsRestApiClient->getPlanetById($planetTransfer);

        $this->addTransferObjectToResponse($planetTransfer, $restResponse);

        return $restResponse;
    }
    public function getPlanetsWithStar(RestRequestInterface $restRequest): RestResponseInterface
    {
        $restResponse = $this->restResourceBuilder->createRestResponse();
        $planetCollectionTransfer = $this->planetsRestApiClient->getPlanetCollectionWithStar(new PlanetCollectionTransfer());

        foreach ($planetCollectionTransfer->getPlanets() as $planetTransfer) {
            $this->addTransferObjectToResponse($planetTransfer, $restResponse);
        }
        return $restResponse;
    }

    private function addTransferObjectToResponse(PlanetTransfer $planetTransfer, RestResponseInterface $restResponse) {
        $restResource = $this->restResourceBuilder->createRestResource(
            PlanetsRestApiConfig::RESOURCE_PLANETS,
            $planetTransfer->getIdPlanet(),
            $this->planetMapper->mapPlanetDataToPlanetRestAttributes($planetTransfer->toArray())
        );
        $restResponse->addResource($restResource);
    }
}

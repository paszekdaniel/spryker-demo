<?php

namespace Pyz\Client\PlanetsRestApi;

use Pyz\Client\PlanetsRestApi\Storage\PlanetsStorageReader;
use Pyz\Client\PlanetsRestApi\Storage\PlanetsStorageReaderInterface;
use Pyz\Client\PlanetsRestApi\Zed\PlanetsRestApiZedStub;
use Pyz\Client\PlanetsRestApi\Zed\PlanetsRestApiZedStubInterface;
use Pyz\Zed\Planet\PlanetDependencyProvider;
use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\Search\SearchClientInterface;
use Spryker\Client\SearchElasticsearch\SearchElasticsearchClientInterface;
use Spryker\Client\Storage\StorageClientInterface;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;
use Spryker\Service\Synchronization\SynchronizationServiceInterface;


class PlanetsRestApiFactory extends AbstractFactory
{
    public function createPlanetZedStub(): PlanetsRestApiZedStubInterface
    {
        return new PlanetsRestApiZedStub($this->getZedRequestClient());
    }

    /**
     * @return \Spryker\Client\ZedRequest\ZedRequestClientInterface
     */
    protected function getZedRequestClient(): ZedRequestClientInterface
    {
        return $this->getProvidedDependency(PlanetsRestApiDependencyProvider::CLIENT_ZED_REQUEST);
    }

    protected function getClientStorage(): StorageClientInterface
    {
        return $this->getProvidedDependency(PlanetsRestApiDependencyProvider::CLIENT_STORAGE);
    }

    protected function getSynchronizationService(): SynchronizationServiceInterface
    {
        return $this->getProvidedDependency(PlanetsRestApiDependencyProvider::SERVICE_SYNCHRONIZATION);
    }
    protected function getClientSearch(): SearchClientInterface {
        return $this->getProvidedDependency(PlanetsRestApiDependencyProvider::CLIENT_SEARCH);
    }
    public function createPlanetsStorageReader(): PlanetsStorageReaderInterface {
        return new PlanetsStorageReader(
            $this->getSynchronizationService(),
            $this->getClientSearch()
        );
    }
}

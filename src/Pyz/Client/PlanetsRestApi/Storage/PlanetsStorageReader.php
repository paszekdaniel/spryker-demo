<?php

namespace Pyz\Client\PlanetsRestApi\Storage;


use Couchbase\SearchQuery;
use Generated\Shared\Transfer\PlanetTransfer;
use Generated\Shared\Transfer\SearchContextTransfer;
use Generated\Shared\Transfer\SearchDocumentTransfer;
use Generated\Shared\Transfer\SynchronizationDataTransfer;
use Pyz\Client\PlanetsRestApi\Plugin\Elasticsearch\Query\PlanetsQueryPlugin;
use Pyz\Client\Search\SearchDependencyProvider;
use Spryker\Client\Search\SearchClientInterface;
use Spryker\Client\SearchElasticsearch\SearchElasticsearchClientInterface;
use Spryker\Client\Storage\StorageClientInterface;
use Spryker\Service\Synchronization\SynchronizationServiceInterface;

/**
 * storage is for redis
 * search is for elasticsearch
 * we decide it in here I think <parameter name="queue_group" value="sync.search.planet"/>
 *
 */
class PlanetsStorageReader implements PlanetsStorageReaderInterface
{
    private SynchronizationServiceInterface $synchronizationService;
    private SearchClientInterface $storageClient;

    public function __construct(SynchronizationServiceInterface $synchronizationService, SearchClientInterface $storageClient)
    {
        $this->synchronizationService = $synchronizationService;
        $this->storageClient = $storageClient;
    }

    public function getPlanetById($idPlanet): PlanetTransfer
    {
//        $synchronizationDataTransfer = new SynchronizationDataTransfer();
//        $synchronizationDataTransfer
//            ->setReference($idPlanet);
//
//        $key = $this->synchronizationService
//            ->getStorageKeyBuilder('planet')
//            ->generateKey($synchronizationDataTransfer);
//
        $searchContextTransfer = new SearchContextTransfer();
//        (new SearchDependencyProvider())->
        $searchQuery = new PlanetsQueryPlugin();
       $data = $this->storageClient->search(
            $searchQuery
        );
        dd($data);
//        $searchDocumentTransfer = new SearchDocumentTransfer();
//        $searchDocumentTransfer->setId($key);
//        $searchDocumentTransfer->setSearchContext()
//        $data = $this->storageClient->readDocument($searchDocumentTransfer);
        $planetTransfer = new PlanetTransfer();
        $planetTransfer->fromArray($data, true);

        return $planetTransfer;
    }
}

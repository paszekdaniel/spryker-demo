<?php

namespace Pyz\Client\PlanetsRestApi\Plugin\Elasticsearch\Query;

use Elastica\Query;
use Generated\Shared\Search\PageIndexMap;
use Generated\Shared\Transfer\SearchContextTransfer;
use Spryker\Client\SearchExtension\Dependency\Plugin\QueryInterface;
use Spryker\Client\SearchExtension\Dependency\Plugin\SearchContextAwareQueryInterface;

class PlanetsQueryPlugin implements QueryInterface, SearchContextAwareQueryInterface
{
    public function __construct()
    {
        $this->setupDefaultSearchContext();
    }

    public function getSearchQuery()
    {
        $query = (new Query())->setSource(['planet']);
        return $query;
    }

    public function getSearchContext(): SearchContextTransfer
    {
        if (!$this->hasSearchContext()) {
            $this->setupDefaultSearchContext();
        }

        return $this->searchContextTransfer;
    }

    public function setSearchContext(SearchContextTransfer $searchContextTransfer): void
    {
        $this->searchContextTransfer = $searchContextTransfer;
    }

    protected function setupDefaultSearchContext(): void
    {
        $searchContextTransfer = new SearchContextTransfer();
        $searchContextTransfer->setSourceIdentifier('planet');

        $this->searchContextTransfer = $searchContextTransfer;
    }

    protected function hasSearchContext(): bool
    {
        return (bool)$this->searchContextTransfer;
    }
}

<?php

namespace Pyz\Client\Catalog;

use Spryker\Client\Catalog\CatalogFactory as SprykerCatalogFactory;

class CatalogFactory extends SprykerCatalogFactory
{
    /**
     * @return \Spryker\Client\Cart\CartClientInterface
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     */
    public function getCartClient()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::CLIENT_CART);
    }

    /**
     * @return \Spryker\Client\ProductStorage\ProductStorageClientInterface
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     */
    public function getProductStorageClient()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::CLIENT_PRODUCT_STORAGE);
    }
}

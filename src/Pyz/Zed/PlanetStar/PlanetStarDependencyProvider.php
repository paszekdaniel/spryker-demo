<?php

namespace Pyz\Zed\PlanetStar;

use Orm\Zed\Planet\Persistence\PyzStarQuery;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class PlanetStarDependencyProvider extends AbstractBundleDependencyProvider
{
    public const QUERY_STAR = 'QUERY_STAR';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     * @throws \Spryker\Service\Container\Exception\ContainerException
     * @throws
    \Spryker\Service\Container\Exception\FrozenServiceException
     */
    public function provideCommunicationLayerDependencies(Container
    $container): Container
    {
        $container = $this->addPyzStarPropelQuery($container);

        return $container;
    }
    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     * @throws \Spryker\Service\Container\Exception\ContainerException
     * @throws
    \Spryker\Service\Container\Exception\FrozenServiceException
     */
    private function addPyzStarPropelQuery(Container $container):
    Container
    {
        $container->set(
            static::QUERY_STAR,
            $container->factory(
                fn() => PyzStarQuery::create()
            )
        );
        return $container;
    }
}

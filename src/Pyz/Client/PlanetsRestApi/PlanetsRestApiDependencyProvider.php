<?php

namespace Pyz\Client\PlanetsRestApi;

use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;

class PlanetsRestApiDependencyProvider extends AbstractDependencyProvider
{
    public const CLIENT_ZED_REQUEST = 'CLIENT_ZED_REQUEST';
    public const CLIENT_STORAGE = 'CLIENT_STORAGE';
    public const SERVICE_SYNCHRONIZATION = 'SERVICE_SYNCHRONIZATION';
    public const CLIENT_SEARCH = 'CLIENT_SEARCH';

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container): Container
    {
        $container = $this->addZedRequestClient($container);
        $container = $this->addStorageClient($container);
        $container = $this->addSynchronizationService($container);
        $container = $this->addSearchClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addZedRequestClient(Container $container): Container
    {
        $container->set(static::CLIENT_ZED_REQUEST, function (Container $container) {
            return $container->getLocator()->zedRequest()->client();
        });

        return $container;
    }
    protected function addStorageClient(Container $container): Container {
        $container->set(static::CLIENT_STORAGE, function (Container $container) {
            return $container->getLocator()->storage()->client();
        });
        return $container;
    }
    protected function addSynchronizationService(Container $container): Container {
        $container->set(static::SERVICE_SYNCHRONIZATION, function (Container $container) {
            return $container->getLocator()->synchronization()->service();
        });
        return $container;
    }
    protected function addSearchClient(Container $container): Container {
        $container->set(static::CLIENT_SEARCH, function (Container $container) {
            return $container->getLocator()->search()->client();
        });
        return $container;
    }
}

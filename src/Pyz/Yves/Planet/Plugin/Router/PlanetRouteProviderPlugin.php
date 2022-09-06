<?php

namespace Pyz\Yves\Planet\Plugin\Router;

use Spryker\Yves\Router\Plugin\RouteProvider\AbstractRouteProviderPlugin;
use Spryker\Yves\Router\Route\RouteCollection;


class PlanetRouteProviderPlugin extends AbstractRouteProviderPlugin
{
    public const PLANET_INDEX = 'planet-index';
    /**
     * @inheritDoc
     */
    public function addRoutes(RouteCollection $routeCollection): RouteCollection
    {
        $routeCollection = $this->addPlanetIndexRoute($routeCollection);

        return $routeCollection;
    }
    /**
     * @param \Spryker\Yves\Router\Route\RouteCollection $routeCollection
     *
     * @return \Spryker\Yves\Router\Route\RouteCollection
     */
    private function addPlanetIndexRoute(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildRoute('/planet/{name}', 'Planet', 'Index', 'indexAction');
        $route = $route->setMethods(['GET']);
        $routeCollection->add(static::PLANET_INDEX, $route);
        return $routeCollection;
    }

}

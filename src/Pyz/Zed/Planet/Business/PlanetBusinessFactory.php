<?php

namespace Pyz\Zed\Planet\Business;

use Pyz\Zed\Planet\Persistence\PlanetEntityManagerInterface;
use Pyz\Zed\Planet\Persistence\PlanetRepositoryInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method PlanetRepositoryInterface getRepository()
 * @method PlanetEntityManagerInterface getEntityManager()
 */
class PlanetBusinessFactory extends AbstractBusinessFactory
{
    public function getPlanetReadHandler(): PlanetReadHandler
    {
        return new PlanetReadHandler($this->getRepository());
    }
    public function getPlanetWriteHandler(): PlanetWriteHandler
    {
        return new PlanetWriteHandler($this->getEntityManager());
    }
}

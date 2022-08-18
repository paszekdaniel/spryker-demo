<?php

namespace Pyz\Zed\PlanetStar\Business;

use Pyz\Zed\PlanetStar\Persistence\PlanetStarEntityManagerInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method PlanetStarEntityManagerInterface getEntityManager()
 */
class PlanetStarBusinessFactory extends AbstractBusinessFactory
{
    public function getStarWriter(): PlanetStarWriter
    {
        return new PlanetStarWriter($this->getEntityManager());
    }
}

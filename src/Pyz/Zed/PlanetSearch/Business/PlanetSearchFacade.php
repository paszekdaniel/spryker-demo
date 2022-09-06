<?php

namespace Pyz\Zed\PlanetSearch\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method PlanetSearchBusinessFactory getFactory()
 */
class PlanetSearchFacade extends AbstractFacade implements PlanetSearchFacadeInterface
{
    /**
     * @param int $idPlanet
     *
     * @return void
     */
    public function publish(int $idPlanet): void
    {
        $this->getFactory()
            ->createPlanetSearchWriter()
            ->publish($idPlanet);
    }

}

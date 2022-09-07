<?php

namespace Pyz\Zed\PlanetSearch\Business;

use Pyz\Zed\PlanetSearch\Business\Writer\PlanetSearchWriter;

class PlanetSearchBusinessFactory
{
    public function createPlanetSearchWriter()
    {
        return new PlanetSearchWriter();

    }
}

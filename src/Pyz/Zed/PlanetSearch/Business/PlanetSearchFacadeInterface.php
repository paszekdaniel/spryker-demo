<?php

namespace Pyz\Zed\PlanetSearch\Business;

interface PlanetSearchFacadeInterface
{
    public function publish(int $idPlanet): void;
}

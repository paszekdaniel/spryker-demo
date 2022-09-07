<?php

namespace Pyz\Client\PlanetsRestApi\Storage;

interface PlanetsStorageReaderInterface
{
    public function getPlanetById($idPlanet);
}

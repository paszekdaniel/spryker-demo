<?php

namespace Pyz\Zed\Planet\Business;

use Pyz\Zed\Planet\Persistence\PlanetRepositoryInterface;

class PlanetReadHandler
{
    protected PlanetRepositoryInterface $repo;

    public function __construct(PlanetRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}

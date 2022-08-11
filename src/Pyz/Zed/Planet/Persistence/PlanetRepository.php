<?php

namespace Pyz\Zed\Planet\Persistence;

use Generated\Shared\Transfer\PlanetTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method PlanetPersistenceFactory getFactory()
 */
class PlanetRepository extends AbstractRepository implements PlanetRepositoryInterface
{

    public function findPlanetEntityByName(string $name): PlanetTransfer
    {
        $query = $this->getFactory()->createPlanetQuery();
        $planetEntity = $query->findOneByName($name);
        $dto = new PlanetTransfer();
        $dto->fromArray($planetEntity->toArray(), true);
        return $dto;
    }
}

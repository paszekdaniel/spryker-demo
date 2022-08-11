<?php

namespace Pyz\Zed\Planet\Persistence;

use Generated\Shared\Transfer\PlanetTransfer;
use Orm\Zed\Planet\Persistence\PyzPlanet;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method PlanetPersistenceFactory getFactory()
 */
class PlanetEntityManager extends AbstractEntityManager implements PlanetEntityManagerInterface
{

    public function savePlanetEntity(PlanetTransfer $dto): PlanetTransfer
    {
        $planetEntity = new PyzPlanet();
        $planetEntity->fromArray($dto->modifiedToArray());
        $planetEntity->save();

        $dto->fromArray($planetEntity->toArray(), true);
        return $dto;
    }

    public function updatePlanetEntity(PlanetTransfer $dto): PlanetTransfer
    {
        // TODO: Implement updatePlanetEntity() method.
    }
}

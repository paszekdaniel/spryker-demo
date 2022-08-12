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

    /**
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function savePlanetEntity(PlanetTransfer $dto): PlanetTransfer
    {
        $planetEntity = new PyzPlanet();
        $planetEntity->fromArray($dto->modifiedToArray());
        $planetEntity->save();

        $dto->fromArray($planetEntity->toArray(), true);
        return $dto;
    }

    /**
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function updatePlanetEntity(PlanetTransfer $dto): PlanetTransfer
    {
        $query = $this->getFactory()->createPlanetQuery();
        $planetEntity = $query->findOneByName($dto->getName());
        $planetEntity->fromArray($dto->modifiedToArray());
        $planetEntity->save();
        $dto->fromArray($planetEntity->toArray(), true);
        return $dto;
    }

    /**
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function deletePlanetByName(string $name)
    {
        $query = $this->getFactory()->createPlanetQuery();
        $planetEntity = $query->findOneByName($name);
        $planetEntity->delete();
    }
}

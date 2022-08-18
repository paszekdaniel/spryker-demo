<?php

namespace Pyz\Zed\Planet\Persistence;

use Generated\Shared\Transfer\PlanetTransfer;
use Propel\Runtime\Exception\PropelException;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

use function PHPUnit\Framework\throwException;

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
        $planetEntity = $this->getFactory()->createPlanetQuery()
            ->filterByIdPlanet($dto->getIdPlanet())
            ->findOneOrCreate();

        $planetEntity->fromArray($dto->toArray());

        if($dto->getStarName()) {
            $star = $this->getFactory()->createStarQuery()->findOneByName($dto->getStarName());
            if(!$star) {
                // wrong star
                throw new PropelException();
            }
            $planetEntity->setPyzStar($star);
        }
            $planetEntity->save();

        $dto->fromArray($planetEntity->toArray());
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

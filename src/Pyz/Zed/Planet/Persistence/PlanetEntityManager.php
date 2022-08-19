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

//        not sure if I still use $dto->getStarName(), but it was first there
        if($dto->getStarName() || $dto->getStar()->getName()) {
            $starName = $dto->getStarName();
            if(!$starName) {
                $starName = $dto->getStar()->getName();
            }
            $star = $this->getFactory()->createStarQuery()->findOneByName($starName);
            if(!$star) {
                // wrong star
                dd($dto);
                throw new PropelException();
            }
//            Does it save star too?
//            $planetEntity->setPyzStar($star);

            $planetEntity->setFkStar($star->getIdStar());
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

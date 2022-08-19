<?php

namespace Pyz\Zed\Planet\Persistence;

use Generated\Shared\Transfer\PlanetCollectionTransfer;
use Generated\Shared\Transfer\PlanetTransfer;
use Generated\Shared\Transfer\PyzStarEntityTransfer;
use Orm\Zed\Planet\Persistence\PyzPlanet;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method PlanetPersistenceFactory getFactory()
 */
class PlanetRepository extends AbstractRepository implements PlanetRepositoryInterface
{

    public function findPlanetEntityByName(string $name): PlanetTransfer
    {
        $query = $this->getFactory()->createPlanetQuery()->leftJoinWithPyzStar();
        $planetEntity = $query->findOneByName($name);
        $dto = new PlanetTransfer();
        $starTransfer = $this->mapPyzStarToStarTransfer($planetEntity->getPyzStar());
        $dto->fromArray($planetEntity->toArray(), true);
//        don't need this, form gets name from star object
//        $dto->setStarName($planetEntity->getPyzStar()->getName());
        $dto->setStar($starTransfer);
        return $dto;
    }
    public function fetchAllPlanets(): PlanetCollectionTransfer
    {
        $query = $this->getFactory()->createPlanetQuery();
        $planets = $query->find();
        return $this->mapPlanetsEntityToCollectionTransfer($planets);

    }

    public function findPlanetEntityById(int $id): PlanetTransfer
    {
        $query = $this->getFactory()->createPlanetQuery();
        $planet = $query->findOneByIdPlanet($id);

        $transfer = new PlanetTransfer();
        if(!$planet) {
            return $transfer;
        }
        $transfer->fromArray($planet->toArray(), true);
        return $transfer;
    }

    public function fetchALlPlanetsWithStars(): PlanetCollectionTransfer
    {
        $query = $this->getFactory()->createPlanetQuery()->leftJoinWithPyzStar();
        $planets = $query->find();
        $collection = $this->mapPlanetsEntityToCollectionTransfer($planets,true);
//        dd($collection);
        return $collection;
    }

    /**
     * @param PyzPlanet[] $planets
     * @return PlanetCollectionTransfer
     */
    private function mapPlanetsEntityToCollectionTransfer($planets, bool $mapStar = false): PlanetCollectionTransfer
    {
        $transfer = new PlanetCollectionTransfer();
        foreach ($planets as $planet) {
            $temp = new PlanetTransfer();
            $temp->fromArray($planet->toArray());
            if($mapStar) {
                $star = $this->mapPyzStarToStarTransfer($planet->getPyzStar());
                $temp->setStar($star);
            }
            $transfer->addPlanet($temp);
        }
        return $transfer;
    }
    private function mapPyzStarToStarTransfer($starEntity): PyzStarEntityTransfer
    {
        $starTransfer = new PyzStarEntityTransfer();
        if(!$starEntity) {
            //return empty instance
            return $starTransfer;
        }
        $starTransfer->fromArray($starEntity->toArray());
        return $starTransfer;
    }

    public function findPlanetWithStarById(int $id): PlanetTransfer
    {
        $query = $this->getFactory()->createPlanetQuery()->leftJoinWithPyzStar();
        $planet = $query->findOneByIdPlanet($id);
        $transfer = new PlanetTransfer();
        if(!$planet) {
            return $transfer;
        }
        $transfer->fromArray($planet->toArray(), true);
        $star = $this->mapPyzStarToStarTransfer($planet->getPyzStar());
        $transfer->setStar($star);
        return $transfer;
    }
}

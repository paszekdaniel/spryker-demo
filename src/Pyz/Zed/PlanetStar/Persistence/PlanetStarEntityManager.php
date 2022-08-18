<?php

namespace Pyz\Zed\PlanetStar\Persistence;

use Generated\Shared\Transfer\PyzStarEntityTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method PlanetStarPersistenceFactory getFactory()
 */
class PlanetStarEntityManager extends AbstractEntityManager implements PlanetStarEntityManagerInterface
{
    public function saveStar(PyzStarEntityTransfer $transfer): PyzStarEntityTransfer
    {
        $star = $this->getFactory()->createStarQuery()->filterByIdStar($transfer->getIdStar())->findOneOrCreate();
        $star->fromArray($transfer->toArray());
        $star->save();

        return $transfer->fromArray($star->toArray());
    }
    public function deleteStar(PyzStarEntityTransfer $transfer) {
        $query = $this->getFactory()->createStarQuery();
//        2 queries to delete by id??
        $query->findByIdStar($transfer->getIdStar())->delete();
    }
}

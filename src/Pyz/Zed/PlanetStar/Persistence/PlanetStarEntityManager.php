<?php

namespace Pyz\Zed\PlanetStar\Persistence;

use Generated\Shared\Transfer\PyzStarEntityTransfer;
use Orm\Zed\Planet\Persistence\PyzStar;
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
//        fixed to 1 query
        $star = new PyzStar();
        $star->setIdStar($transfer->getIdStar())->delete();
    }
}

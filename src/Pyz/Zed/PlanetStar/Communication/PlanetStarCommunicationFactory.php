<?php

namespace Pyz\Zed\PlanetStar\Communication;

use Generated\Shared\Transfer\PyzStarEntityTransfer;
use Orm\Zed\Planet\Persistence\PyzPlanetQuery;
use Orm\Zed\Planet\Persistence\PyzStarQuery;
use Pyz\Zed\PlanetStar\Communication\Form\StarForm;
use Pyz\Zed\PlanetStar\Communication\Table\StarTable;
use Pyz\Zed\PlanetStar\PlanetStarDependencyProvider;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Symfony\Component\Form\FormInterface;

class PlanetStarCommunicationFactory extends AbstractCommunicationFactory
{
    public function createStarForm(?PyzStarEntityTransfer $transfer = null, array $options = []): FormInterface
    {
        return $this->getFormFactory()->create(
            StarForm::class,
            $transfer,
            $options
        );
    }
    public function createStarTable(): StarTable
    {
        return new StarTable($this->getStarPropelQuery());
    }
    private function getStarPropelQuery(): PyzStarQuery
    {
        return $this->getProvidedDependency(PlanetStarDependencyProvider::QUERY_STAR);
    }
}

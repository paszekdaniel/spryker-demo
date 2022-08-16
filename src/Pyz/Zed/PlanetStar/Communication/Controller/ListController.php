<?php

namespace Pyz\Zed\PlanetStar\Communication\Controller;

use Pyz\Zed\PlanetStar\Communication\PlanetStarCommunicationFactory;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method PlanetStarCommunicationFactory getFactory()
 */
class ListController extends AbstractController
{
    public function indexAction(Request $request) {
        $starTable = $this->getFactory()->createStarTable();
        return $this->viewResponse([
            'starTable' => $starTable->render()
        ]);
    }
    public function tableAction() {
        $starTable = $this->getFactory()->createStarTable();
        return $this->jsonResponse($starTable->fetchData());
    }
}

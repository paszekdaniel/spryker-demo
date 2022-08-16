<?php

namespace Pyz\Zed\PlanetStar\Communication\Controller;
use Pyz\Zed\PlanetStar\Business\PlanetStarFacadeInterface;
use Pyz\Zed\PlanetStar\Communication\PlanetStarCommunicationFactory;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method PlanetStarCommunicationFactory getFactory()
 * @method PlanetStarFacadeInterface getFacade()
 */
class CreateController extends AbstractController
{
    public function indexAction(Request $request) {
        $starForm = $this->getFactory()->createStarForm()->handleRequest($request);

        if ($starForm->isSubmitted() && $starForm->isValid()) {
            $result = $this->getFacade()->createStar($starForm->getData());

            $this->addSuccessMessage('Star was created. :)');


            return $this->redirectResponse('/planet/list');

        }
        return $this->viewResponse([
            'starForm' => $starForm->createView()
        ]);
    }
}

<?php

namespace Pyz\Zed\Planet\Communication\Controller;

use Generated\Shared\Transfer\PlanetTransfer;
use Generated\Shared\Transfer\PyzStarEntityTransfer;
use Pyz\Zed\Planet\Business\PlanetFacadeInterface;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;


/**
 * @method \Pyz\Zed\Planet\Communication\PlanetCommunicationFactory getFactory()
 * @method PlanetFacadeInterface getFacade()
 */
class CreateController extends AbstractController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */

    public function indexAction(Request $request)
    {
        $transfer = new PlanetTransfer();
        $transfer->setStar(new PyzStarEntityTransfer());
        $planetForm = $this->getFactory()
            ->createPlanetForm($transfer)
            ->handleRequest($request);

        if ($planetForm->isSubmitted() && $planetForm->isValid()) {

            $result = $this->getFacade()->createPlanetEntity($planetForm->getData());
            if(!$result) {
                $this->addErrorMessage("Planet couldn't be created. Probably already exists or star is not defined");
            } else {
                $this->addSuccessMessage('Planet was created. :)');
            }


            return $this->redirectResponse('/planet/list');
        }

        return $this->viewResponse([
            'planetForm' => $planetForm->createView()
        ]);
    }

}

<?php

namespace Pyz\Zed\Planet\Communication\Controller;

use Generated\Shared\Transfer\PlanetTransfer;
use Pyz\Zed\Planet\Business\PlanetFacadeInterface;
use Pyz\Zed\Planet\Communication\Form\PlanetForm;
use Pyz\Zed\Planet\Communication\UtilCommunication;
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
        $planetForm = $this->getFactory()
            ->createPlanetForm()
            ->handleRequest($request);

        if ($planetForm->isSubmitted() && $planetForm->isValid()) {

            $dto = new PlanetTransfer();

            UtilCommunication::mapFormRequestToDto($dto, $planetForm);

            $result = $this->getFacade()->createPlanetEntity($dto);
            if(!$result) {
                $this->addErrorMessage("Planet couldn't be created. Probably this one already exists");
            } else {
                $this->addSuccessMessage('Planet was created. At least really likely :)');
            }


            return $this->redirectResponse('/planet/list');
        }

        return $this->viewResponse([
            'planetForm' => $planetForm->createView()
        ]);
    }

}

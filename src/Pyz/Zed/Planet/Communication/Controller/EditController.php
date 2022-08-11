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
class EditController extends AbstractController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
//        $this->castId()
        $name = ($request->query->get('name'));
        $planetTransfer = (new PlanetTransfer());
        if($name) {
            $planetTransfer = $this->getFacade()->findPlanetByName($name);
        }
        $planetForm = $this->getFactory()
            ->createPlanetForm($planetTransfer)
            ->handleRequest($request);

        if ($planetForm->isSubmitted() && $planetForm->isValid()) {
            $dto = new PlanetTransfer();
            UtilCommunication::mapFormRequestToDto($dto, $planetForm);

            $result = $this->getFacade()->updatePlanetEntity($dto);
            if(!$result) {
                $this->addErrorMessage("Planet couldn't be created. Probably this one already exists");
            } else {
                $this->addSuccessMessage('Planet was updated. At least I hope :)');
            }

            return $this->redirectResponse('/planet/list');
        }

        return $this->viewResponse([
            'planetForm' => $planetForm->createView()
        ]);
    }

}

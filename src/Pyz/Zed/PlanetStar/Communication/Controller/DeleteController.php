<?php

namespace Pyz\Zed\PlanetStar\Communication\Controller;
use Generated\Shared\Transfer\PyzStarEntityTransfer;
use Pyz\Zed\PlanetStar\Business\PlanetStarFacadeInterface;
use Pyz\Zed\PlanetStar\Communication\PlanetStarCommunicationFactory;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method PlanetStarCommunicationFactory getFactory()
 * @method PlanetStarFacadeInterface getFacade()
 */
class DeleteController extends AbstractController
{
    public function indexAction(Request $request) {
        $id = $this->castId($request->query->get('id'));
        $transfer = new PyzStarEntityTransfer();
        $transfer->setIdStar($id);
        try {
            $this->getFacade()->deleteStar($transfer);
        } catch (\Exception $e) {
            $this->addErrorMessage("Something went wrong. Try again!");
            return $this->redirectResponse('/planet-star/list');
        }

        $this->addSuccessMessage("Successfully deleted a star");
        return $this->redirectResponse('/planet-star/list');
    }
}

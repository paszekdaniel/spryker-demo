<?php

namespace Pyz\Zed\Planet\Communication\Controller;

use Pyz\Zed\Planet\Business\PlanetFacadeInterface;
use Symfony\Component\HttpFoundation\Request;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;


/**
 * @method \Pyz\Zed\Planet\Communication\PlanetCommunicationFactory getFactory()
 * @method PlanetFacadeInterface getFacade()
 */
class DeleteController extends AbstractController
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
//        Probably needs more logic than this

        $name = ($request->query->get('name'));

        if($this->getFacade()->deletePlanetByName($name)) {
            $this->addSuccessMessage("Deleted planet successfully");
        } else {
            $this->addErrorMessage("Couldn't delete planet");
        }
        return $this->redirectResponse('/planet/list');
    }


}

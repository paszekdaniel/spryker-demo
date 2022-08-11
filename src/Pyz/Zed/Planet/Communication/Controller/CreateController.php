<?php

namespace Pyz\Zed\Planet\Communication\Controller;

use Generated\Shared\Transfer\PlanetTransfer;
use Pyz\Zed\Planet\Business\PlanetFacadeInterface;
use Pyz\Zed\Planet\Communication\Form\PlanetForm;
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
            $dto->setName($planetForm->get(PlanetForm::FIELD_NAME)->getData());
            $dto->setInterestingFact($planetForm->get(PlanetForm::FIELD_INTERESTING_FACT)->getData());
            $dto->setVolumeInEarths($planetForm->get(PlanetForm::FIELD_VOLUME_IN_EARTHS)->getData());
            $dto->setNrFromSun($planetForm->get(PlanetForm::FIELD_NR_FROM_SUN)->getData());


            $this->getFacade()->createPlanetEntity($dto);

            $this->addSuccessMessage('Planet was created. At least really likely :)');

            return $this->redirectResponse('/planet/list');
        }

        return $this->viewResponse([
            'planetForm' => $planetForm->createView()
        ]);
    }

}

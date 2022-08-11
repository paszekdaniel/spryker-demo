<?php

namespace Pyz\Zed\Planet\Communication;

use Generated\Shared\Transfer\PlanetTransfer;
use Pyz\Zed\Planet\Communication\Form\PlanetForm;
use Symfony\Component\Form\FormInterface;

class UtilCommunication
{
    public static function mapFormRequestToDto(PlanetTransfer $dto, FormInterface $form) {
        $dto->setName($form->get(PlanetForm::FIELD_NAME)->getData());
        $dto->setInterestingFact($form->get(PlanetForm::FIELD_INTERESTING_FACT)->getData());
        $dto->setVolumeInEarths($form->get(PlanetForm::FIELD_VOLUME_IN_EARTHS)->getData());
        $dto->setNrFromSun($form->get(PlanetForm::FIELD_NR_FROM_SUN)->getData());
    }
}

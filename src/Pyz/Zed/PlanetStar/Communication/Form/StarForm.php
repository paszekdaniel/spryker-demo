<?php

namespace Pyz\Zed\PlanetStar\Communication\Form;
use Generated\Shared\Transfer\PlanetTransfer;
use Generated\Shared\Transfer\PyzStarEntityTransfer;
use Pyz\Zed\Planet\Communication\Form\PlanetForm;
use Spryker\Zed\Kernel\Communication\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;

class StarForm extends AbstractType
{
    public const FIELD_NAME = 'name';
    public const FIELD_DISTANCE = 'distance';
    public const FIELD_MASS_IN_SUNS = 'mass_in_suns';
    private const BUTTON_SUBMIT = 'Submit';

    public function getBlockPrefix()
    {
        return 'star';
    }
    public function configureOptions(OptionsResolver $resolver) {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class' => PyzStarEntityTransfer::class
        ]);
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void {
        $this->addNameField($builder)->addDistanceField($builder)
            ->addVolumeField($builder)->addSubmitButton($builder);
    }
    private function addNameField(FormBuilderInterface $builder): StarForm {
        $builder->add(static::FIELD_NAME, TextType::class, [
            'required' => false,
            'constraints' => [
                new Length([
                    'max' => 50
                ])
            ]
        ]);
            return $this;
    }
    private function addDistanceField(FormBuilderInterface $builder): StarForm {
        $builder->add(static::FIELD_DISTANCE, NumberType::class,[
            'required' => false,
            'constraints' => [
                new Positive()
            ]
        ]);
        return $this;
    }
    private function addVolumeField(FormBuilderInterface $builder): StarForm {
        $builder->add(static::FIELD_MASS_IN_SUNS, NumberType::class, [
            'required' => false,
            'constraints' => [
                new Positive()
            ]
        ]);
        return $this;
    }
    private function addSubmitButton(FormBuilderInterface $builder): StarForm
    {
        $builder->add(static::BUTTON_SUBMIT, SubmitType::class);
        return $this;
    }


}

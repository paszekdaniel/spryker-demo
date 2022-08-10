<?php

namespace Pyz\Zed\Planet\Communication\Form;

use Spryker\Zed\Kernel\Communication\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Generated\Shared\Transfer\PlanetTransfer;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;


class PlanetForm extends AbstractType
{
    private const FIELD_NAME = 'name';
    private const FIELD_INTERESTING_FACT = 'interesting_fact';
    private const FIELD_NR_FROM_SUN = 'nr_from_sun';
    private const FIELD_VOLUME_IN_EARTHS = 'volume_in_earths';
    private const BUTTON_SUBMIT = 'Submit';

    /**
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return 'planet';
    }

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class' => PlanetTransfer::class
        ]);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addNameField($builder)->addInterestingFactField($builder)
            ->addNrFromSun($builder)->addVolumeInEarths($builder)->addSubmitButton($builder);
    }


    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    private function addNameField(FormBuilderInterface $builder): PlanetForm
    {
        $builder->add(static::FIELD_NAME, TextType::class, [
            'constraints' => [
                new NotBlank(),
                new Length([
                    'max' => 50,
                ])
            ]
        ]);
        return $this;
    }


    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    private function addInterestingFactField(FormBuilderInterface $builder): PlanetForm
    {
        $builder->add(static::FIELD_INTERESTING_FACT, TextType::class, [
            'constraints' => [
                new NotBlank(),
                new Length([
                    'min' => 10,
                    'minMessage' => 'Facts minimum length is at least {{ limit }}. Currently: {{ value }}',
                    'max' => 255,
                    'maxMessage' => 'Facts maximum length is {{ limit }} characters'
                ])
            ]
        ]);
        return $this;
    }
    private function addNrFromSun(FormBuilderInterface $builder): PlanetForm
    {
        $builder->add(static::FIELD_NR_FROM_SUN, NumberType::class, [
            'html5' => true,
            'required'   => false,
            'constraints' => [
                new Positive()
            ]
        ]);
        return $this;
    }
    private function addVolumeInEarths(FormBuilderInterface $builder): PlanetForm
    {
        $builder->add(static::FIELD_VOLUME_IN_EARTHS, NumberType::class, [
            'html5' => true,
            'required' => false,
            'constraints' => [
                new Positive()
            ]
        ]);
        return $this;
    }
    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    private function addSubmitButton(FormBuilderInterface $builder): PlanetForm
    {
        $builder->add(static::BUTTON_SUBMIT, SubmitType::class);
        return $this;
    }

}

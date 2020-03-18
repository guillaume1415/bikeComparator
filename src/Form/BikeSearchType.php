<?php

namespace App\Form;

use App\Entity\BikeSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BikeSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('MaxPrice', MoneyType::class, [
                'required'   => false,
            ])
            ->add('MinPrice',MoneyType::class, [
                'required'   => false,
            ])
            ->add('Mark', ChoiceType::class, [
                'choices'  => [
                    'Maybe' => null,
                    'Yes' => true,
                    'No' => false,
                    ],
            ])
            ->add('FrameSize',CheckboxType::class, [
                'label'    => 'Conlogo',
                'label'    => 'Specialized',
                'required' => false,
            ])
            ->add('frameMaterial')
            ->add('ForkMaterial')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BikeSearch::class,
        ]);
    }
}

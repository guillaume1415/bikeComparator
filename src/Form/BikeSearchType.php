<?php

namespace App\Form;

use App\Entity\BikeSearch;
use App\Entity\Marks;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
            /*->add('FrameSize', ChoiceType::class, [
                'choices'  => [
                    'tout' => null,
                    '50' => null,
                    '52' => true,
                    '54' => false,
                    '56' => false,
                    '58' => false,
                    '60' => false,
                    '62' => false,
                    'S' => false,
                    'M' => false,
                    'L' => false,
                    'XL' => false,
                    'XXL' => false,
                    ],
            ])

            ->add('frameMaterial')
            ->add('ForkMaterial')
            ->add('Marke', EntityType::class,[
                'label' => false,
                'required' => false,
                'class' => marks::class,
                'choice_label'=> 'name',
                'expanded' => true,
                'multiple' => true,


            ])*/


        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BikeSearch::class,
        ]);
    }
}

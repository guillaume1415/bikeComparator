<?php

namespace App\Form;

use App\Entity\Bike;
use App\Entity\Marks;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BikeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('price')
            ->add('frame_size')
            ->add('frame_material')
            ->add('fork_material')
            ->add('options', EntityType::class,[
                'class' => marks::class,
                'choice_label'=> 'name',
                'multiple' => true
            ])
            ->add('title')
            ->add('exist')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bike::class,
        ]);
    }
}

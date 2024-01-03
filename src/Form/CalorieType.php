<?php

namespace App\Form;

use App\Entity\Calorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CalorieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date',DateTimeType::class,[
                'label' => 'Sélectionnez une date',
                'required' => false
            ])
            ->add('totalCalories',NumberType::class,[
                'label' => 'Total calories ingérées la veille',
                'required' => false
            ])
            ->add('save',SubmitType::class,['label' => 'Envoyer','attr' => ['class' => ' text-center btn btn-dark']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Calorie::class,

        ]);
    }
}

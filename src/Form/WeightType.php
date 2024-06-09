<?php

namespace App\Form;

use App\Entity\Weight;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WeightType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date',DateTimeType::class,[
                'label' => 'Sélectionnez une date',
                'required' => false
            ])
            ->add('weight',NumberType::class,[
                'label' => 'Poids',
                'required' => false
            ])
            ->add('description',TextareaType::class,[
                'label' => 'Décrire la cause de l\'augmentation ou la baisse du poids !',
                'attr' => ['placeholder' => 'La baisse de mon poids est, dû au fait que j\'ai moins mangé hier !'],
                'required' => false
            ])
            ->add('save',SubmitType::class,['label' => 'Envoyer','attr' => ['class' => ' text-center btn btn-dark']]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Weight::class,
        ]);
    }
}

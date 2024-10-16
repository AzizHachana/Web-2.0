<?php

namespace App\Form;

use App\Entity\Aeroport;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormAeroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class)
        ->add('ville', ChoiceType::class, [
            'choices' => [
                'Frankfurt' => 'Frankfurt',
                'Rome' => 'Rome',
                'Alger' => 'Alger',
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Aeroport::class,
        ]);
    }
}

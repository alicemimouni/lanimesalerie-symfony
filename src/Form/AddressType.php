<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('line1', TextType::class, [
                'label' => 'Adresse',
                'attr' => [
                    'class' => 'form-control mb-3',
                ],
                'label_attr' => [
                    'class' => 'form-label'
                ]
            ])
            ->add('complement', TextType::class, [
                'label' => 'Complément',
                'attr' => [
                    'class' => 'form-control mb-3',
                ],
                'label_attr' => [
                    'class' => 'form-label'
                ]
            ])
            ->add('postalCode', TextType::class, [
                'label' => 'Code Postal',
                'attr' => [
                    'class' => 'form-control mb-3',
                ],
                'label_attr' => [
                    'class' => 'form-label'
                ]
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
                'attr' => [
                    'class' => 'form-control mb-3',
                ],
                'label_attr' => [
                    'class' => 'form-label'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}

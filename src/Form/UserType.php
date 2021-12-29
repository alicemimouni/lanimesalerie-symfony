<?php

namespace App\Form;

use App\Entity\User;
use App\Form\AddressType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'class'=> 'form-control mb-3'
                ],
                'label_attr'=> [
                    'class'=> 'form-label'
                ]
            ])
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Utilisateur' => 'ROLE_USER',
                    'Administrateur' => 'ROLE_ADMIN'
                ],
                'attr' => ['class' => 'form-control'],
                'expanded' => true,
                'multiple' => true,
                'label' => 'Rôle' 
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'class'=> 'form-control mb-3'
                ],
                'label_attr'=> [
                    'class'=> 'form-label'
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'class'=> 'form-control mb-3',
                ],
                'label_attr'=> [
                    'class'=> 'form-label'
                ]
            ])
            ->add('telNumber', TelType::class, [
                'label' => 'Téléphone',
                'attr' => [
                    'class'=> 'form-control mb-3',
                ],
                'label_attr'=> [
                    'class'=> 'form-label'
                ]
            ])
            ->add('isMan', ChoiceType::class, [
                'choices' => [
                    'Homme' => true,
                    'Femme' => false
                ],
                'label' => 'Sexe',
                'attr' => [
                    'class'=> 'form-control m-0 mb-3',
                ],
                'label_attr'=> [
                    'class'=> 'form-label'
                ]
            ])
            ->add('birthDate', DateType::class, [
                'label' => 'Date de naissance',
                'years' => range(date('Y') -100, date('Y')),
                'attr' => [
                    'class'=> 'form-control mb-3',
                ],
                'label_attr'=> [
                    'class'=> 'form-label'
                ]
            ])
            ->add('registrerDate', DateType::class, [
                'label' => 'Date d\'inscription',
                'attr' => [
                    'class'=> 'form-control mb-3',
                ],
                'label_attr'=> [
                    'class'=> 'form-label'
                ]
            ])
            ->add('address', AddressType::class, [
                'label' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

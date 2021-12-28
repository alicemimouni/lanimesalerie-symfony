<?php

namespace App\Form;

use App\Form\AddressType;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isMan', ChoiceType::class, [
                'choices' => [
                    'Mme' => false,
                    'Mr' => true
                ],
                'label' => 'Civilité',
                'attr' => [
                    'class' => 'form-control mb-3',
                ],
                'label_attr' => [
                    'class' => 'form-label'
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'class' => 'form-control mb-3',
                ],
                'label_attr' => [
                    'class' => 'form-label'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'class' => 'form-control mb-3',
                ],
                'label_attr' => [
                    'class' => 'form-label'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'class'=> 'form-control mb-3'
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
            ->add('birthDate', DateType::class, [
                'label' => 'Date de naissance',
                'years' => range(date('Y') -100, date('Y')),
                'attr' => [
                    'class'=> 'form-control mb-3 select-style',
                ],
                'label_attr'=> [
                    'class'=> 'form-label'
                ]
            ])
            ->add('address', AddressType::class, [
                'label' => false
            ])
            ->add('plainPassword', RepeatedType::class, [
                'mapped' => false,
                'type' => PasswordType::class,
                'invalid_message' => 'Le champs mot de passe ne peut être vide',
                'attr' => [
                    'class'=> 'form-control mb-3'
                ],
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => ['label' => 'Mot de passe', 'attr'=> [
                    'class'=> 'form-control mb-3'
                ],
                'label_attr'=> [
                    'class'=> 'form-label'
                ]
                ],
                'second_options' => ['label' => 'Confirmer le mot de passe', 
                    'attr' => [
                        'class' => 'form-control mb-3'
                    ],
                    'label_attr'=> [
                        'class'=> 'form-label'
                    ]
                    ],
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

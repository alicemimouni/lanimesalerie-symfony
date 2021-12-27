<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
    
            ->add('title', TextType::class, [
                'label' => 'Intitulé',
                'attr' => [
                    'class'=> 'form-control mb-3',
                    'placeholder'=> 'Intitulé de l\'article'
                ],
                'label_attr'=> [
                    'class'=> 'form-label'
                ]
            ])
            ->add('price', MoneyType::class, [
                'label' => 'Prix en ',
                'attr' => [
                    'class'=> 'form-control mb-3',
                ],
                'label_attr'=> [
                    'class'=> 'form-label margin-right'
                ]
            ])
            ->add('reference', TextType::class, [
                'label' => 'Référence',
                'attr' => [
                    'class'=> 'form-control mb-3',
                ],
                'label_attr'=> [
                    'class'=> 'form-label'
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => [
                    'class'=> 'form-control mb-3',
                    'placeholder'=> 'Description'
                ],
                'label_attr'=> [
                    'class'=> 'form-label'
                ]
            ])
            ->add('startDate', DateType::class, [
                'label' => 'Date début',
                'attr' => [
                    'class'=> 'form-control mb-3',
                ],
                'label_attr'=> [
                    'class'=> 'form-label'
                ]
            ])
            ->add('endDate', DateType::class, [
                'label' => 'Date fin',
                'attr' => [
                    'class'=> 'form-control mb-3',
                    'required' => false
                ],
                'label_attr'=> [
                    'class'=> 'form-label'
                ]
            ])
            
            ->add('isonsale', ChoiceType::class, [
                'choices' => [
                    'Oui' => true,
                    'Non' => false
                ],
                'label' => 'En solde',
                'attr' => [
                    'class'=> 'form-control mb-3',
                ],
                'label_attr'=> [
                    'class'=> 'form-label'
                ]
            ])
            ->add('categories', EntityType::class, [
                'class'=> Category::class,
                'multiple'=> true,
                'expanded'=> true,
                'label' => 'Catégories',
                'attr' => [
                    'class'=> 'form-control mb-3 input-checkbox',
                ],
                'label_attr'=> [
                    'class'=> 'form-label m-2'
                ]
            ])
            ->add('image', FileType::class, [
                'label' => 'Images',
                // unmapped means that this field is not associated to any entity property
                'mapped' => false,
                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,
                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '1g',
                        'mimeTypes' => [
                            'image/*'
                        ],
                        'mimeTypesMessage' => 'Image invalide',
                        'maxSizeMessage' => 'Le fichier est trop lourd'
                    ])
                ],
            ])
         
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label'=>'Nom',
                'attr'=> [
                    'class'=> 'form-control mb-3',
                    'placeholder'=> 'Nom de la catégorie'
                ],
                'label_attr'=> [
                    'class'=> 'label-control'
                ]
            ])
            ->add('beginDate', DateType::class, [
                'label' => 'Date de début',
                'attr'=> [
                    'class'=> 'form-control mb-3']
            ])
            ->add('endDate',  DateType::class, [
                'label' => 'Date de fin',
                'attr'=> [
                    'class'=> 'form-control mb-3']
            ])
            ->add('parent', EntityType::class, [
                'class'=> Category::class,
                'required'=> false,
                'label'=>'Categorie Parente',
                'attr'=> [
                    'class'=> 'form-control mb-3',
                    'placeholder'=> 'Nom de la catégorie'
                ],
                'label_attr'=> [
                    'class'=> 'label-control'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}

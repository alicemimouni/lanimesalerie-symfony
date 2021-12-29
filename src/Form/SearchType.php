<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('searchBar', TextType::class, [
                'required' =>false,
                'label' =>false,
                'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Recherche de produits...',
                        
                ]         
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-white text-white icon',
                    'style' => 'background: center / contain no-repeat url("img/searchsvg.svg")',
                ]
               
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}

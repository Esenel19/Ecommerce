<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class ProductFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null,[
                'label' => 'Title'
            ])
            ->add('image', FileType::class,[
                'label' => 'Inserer une image'
            ])
            ->add('price', null,[
                'label' => 'Prix du produit'
            ])
            ->add('categorie', null,[
                'label' => 'Ajouter Categorie categorie'
            ])
        ;
    }

    
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\Types;
use App\Repository\TypesRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('photoFile',FileType::class,[
                "multiple"=>true,
            ])
            ->add('price')
            ->add('description')
            ->add('advice')
            ->add('types',EntityType::class, [
                'class' => Types::class,
                'query_builder' => function (TypesRepository $ty) {
                    return $ty->createQueryBuilder('types');
                },
                'choice_label' => 'title',
                'multiple' => true
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

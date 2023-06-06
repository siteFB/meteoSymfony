<?php

namespace App\Form;

use App\Entity\Ephemeride;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EphemerideType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre',
                'disabled' => false,
                'attr' => [
                    'class' => 'form-control btn test bg-white fw-light',
                ],
                'mapped' => true,
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'disabled' => false,
                'attr' => [
                    'class' => 'form-control btn test bg-white fw-light',
                ],
                'mapped' => true,
            ])
            ->add('image', TextType::class, [
                'label' => 'Nom de l\'image',
                'disabled' => false,
                'attr' => [
                    'class' => 'form-control btn test bg-white fw-light',
                ],
                'mapped' => true,
            ])
            ->add('slug', TextType::class, [
                'label' => 'Slug',
                'disabled' => false,
                'attr' => [
                    'class' => 'form-control btn test bg-white fw-light',
                ],
                'mapped' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ephemeride::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Messagerie;
use DateTimeImmutable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MessagerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sender', TextType::class, [
                'label' => 'Expéditeur',
                'disabled' => false,
                'attr' => [
                    'class' => 'form-control btn test bg-white fw-light',
                ],
                'mapped' => true,
            ])
            ->add('recipient', TextType::class, [
                'label' => 'Destinataire',
                'disabled' => false,
                'attr' => [
                    'class' => 'form-control btn test bg-white fw-light',
                ],
                'mapped' => true,
            ])
            ->add('sujet', TextType::class, [
                'label' => 'Sujet',
                'disabled' => false,
                'attr' => [
                    'class' => 'form-control btn test bg-white fw-light',
                ],
                'mapped' => true,
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',
                'disabled' => false,
                'attr' => [
                    'class' => 'form-control btn test bg-white fw-light',
                ],
                'mapped' => true,
            ]) 
            ->add('created_at', DateTimeImmutable::class, [
                'label' => 'Date',
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
            'data_class' => Messagerie::class,
        ]);
    }
}

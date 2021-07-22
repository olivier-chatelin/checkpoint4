<?php

namespace App\Form;

use App\Entity\Detail;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DetailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('header', TextType::class,[
                'label'=>'Emploi recherché'
            ])
            ->add('address', TextType::class,[
                'label'=>'adresse'
            ])
            ->add('zipCode', TextType::class,[
        'label'=>'Code Postal'
            ])
            ->add('city', TextType::class,[
        'label'=>'Ville'
            ])
            ->add('tel', TextType::class,[
        'label'=>'Téléphone'
            ])
            ->add('linkedin', TextType::class,[
        'label'=>'Linkedin'
            ])
            ->add('github', TextType::class,[
        'label'=>'Github'
            ])
            ->add('avatar', AvatarType::class,[
                'label'=>false,
        ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Detail::class,
        ]);
    }
}

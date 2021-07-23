<?php

namespace App\Form;

use App\Entity\Scholarship;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScholarshipType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('graduation',TextType::class,[
                'label'=>'Diplôme'
            ])
            ->add('yearStart',BirthdayType::class,[
                'label'=>'Début'
            ])
            ->add('yearEnd',BirthdayType::class,[
                'label'=>'Fin'
            ])
            ->add('description', TextareaType::class,[
                'label'=>'description'
            ])
            ->add('school', TextType::class,[
                'label'=>'école'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Scholarship::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Scholarship;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
            ->add('yearStart',DateType::class,[
                'label'=>'Début',
                'widget'=>'single_text'
            ])
            ->add('yearEnd',DateType::class,[
                'label'=>'Fin',
                'widget'=>'single_text'
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

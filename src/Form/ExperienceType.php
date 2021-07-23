<?php

namespace App\Form;

use App\Entity\Experience;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExperienceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('jobName',TextType::class,[
                'label'=>'Emploi'
            ])
            ->add('employer',TextType::class,[
                'label'=>'Employeur'
            ])
            ->add('yearStart',BirthdayType::class,[
                'label'=>'Date de début'
            ])
            ->add('yearEnd',BirthdayType::class,[
                'label'=>'Date de fin'
            ])
            ->add('description', TextareaType::class,[
                'label' => 'description du poste'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Experience::class,
        ]);
    }
}

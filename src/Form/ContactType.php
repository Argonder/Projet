<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;


class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', TextType::class, [
                'required'  => true,
                'label'     => false,
                'constraints' => [],
                'attr'      => [
                    'class' => 'form-control' ,
                    'placeholder' => 'Jane.doe@test.fr'
                ]
            ])

            ->add('telephone', TextType::class, [
            'required'  => true,
            'label'     => false,
            'constraints' => [],
            'attr'      => [
                'class' => 'form-control' ,
                'placeholder' => '00.00.00.00'
            ]
        ]);
    }

}


<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre_article', TextType::class, [
                'required'  => true,
                'label'     => false,
                'constraints' => [new NotBlank()],
                'attr'      => [
                    'class' => 'form-control' ,
                    'placeholder' => 'titre de l\'article...'
                ]
            ])
            ->add('description', TextareaType::class,[

                'required'  => true,
                'label'     => false,
                'constraints' => [new NotBlank()],
                'attr'      => [
                    'class' => 'form-control' ,
                    'placeholder' => 'description de l\'article...'
                ]
            ])
            ->add('image', FileType::class, [
                'required'   => false ,
                'label'     => false ,
                'mapped' => false,
                'attr'     => [
                    'class'   => 'dropify'
                ]
            ])
            ->add('date', DateType::class, [
                'required'   => true ,
                'label'     => false ,
                'attr'     => [
                    'class'   => 'dropify'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            //'data_class' => Article::class,
        ]);
    }
}

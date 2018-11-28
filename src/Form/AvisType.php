<?php

namespace App\Form;

use App\Entity\State;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AvisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('state')
            ->add('title', TextType::class, ["label" => "form.title"])
            ->add('picture', FileType::class, ["label" => "form.picture"])
            ->add('description', TextType::class , ["label" => "form.description"])
            ->add('eventAt', DateType::class, ["widget" => "single_text"], ["label" => "form.eventAt"])
            ->add('city', TextType::class, ["label" => "form.city"])
            ->add('address', TextType::class, ["label" => "form.address"])
            ->add('category')
            ->add('county')
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => State::class,
        ]);
    }
}

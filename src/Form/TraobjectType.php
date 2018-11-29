<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Traobject;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Forms;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\VichUploaderBundle;

class TraobjectType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('state')
            ->add('title', TextType::class, ["label" => "form.title"])
            ->add('pictureFile',VichImageType::class, ["label" => "picture"])
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
            'data_class' => Traobject::class,
            'translation_domain' => 'forms'
        ]);
    }

}

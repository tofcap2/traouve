<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Traobject;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Forms;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TraobjectType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('picture', FileType::class)
            ->add('description', TextType::class)
            ->add('eventAt')
            ->add('city', TextType::class)
            ->add('address', TextType::class)
            ->add('category', ChoiceType::class,[
                'choices' => $this->getChoices()
            ])
            ->add('county', TextType::class)
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

    private function getChoices()
    {
        $choices = Category::class;
        $output = [];
        foreach($choices as $k => $v){
            $output[$v] = $k;
        }
        return $output;

    }
}

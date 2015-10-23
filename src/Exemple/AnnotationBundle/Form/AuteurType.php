<?php

namespace Exemple\AnnotationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AuteurType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lenom')
            ->add('leprenom')
            ->add('labio')
                // affichage de livre en texte (choix de letitre) et en checkbox ('expanded'=>true)
            ->add('livre', NULL, ['choice_label' => 'letitre','expanded'=>true])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Exemple\AnnotationBundle\Entity\Auteur'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'exemple_annotationbundle_auteur';
    }
}

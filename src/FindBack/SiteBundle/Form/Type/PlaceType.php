<?php

namespace FindBack\SiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PlaceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('city', 'text', array('label' => false,
                'attr' => array(
                    'placeholder' => 'Ville',
                )
            ))
            ->add('street', 'text', array('label' => false,
                'attr' => array(
                    'placeholder' => 'Adresse',
                )
            ))
            ->add('establishment', 'text', array('label' => false,
                'attr' => array(
                    'placeholder' => 'Établissement',
                ) //choice
            ))
            ->add('name', 'text', array('label' => false,
                'attr' => array(
                    'placeholder' => 'Nom',
                )
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FindBack\SiteBundle\Entity\Place',
        ));
    }

    public function getName()
    {
        return 'place';
    }
}
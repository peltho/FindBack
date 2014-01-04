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
            ->add('formatted_address', 'text', array('label' => false,
                'attr' => array(
                    'placeholder' => 'Où étiez-vous ?'
                )
            ))
            ->add('city', 'hidden')
            ->add('street', 'hidden')
            ->add('location', 'hidden')
            ->add('establishment_name', 'hidden')
            ->add('establishment_type', 'choice', array('label' => false,
                'choices' => array(
                    ''           => 'Établissement...',
                    'night_club' => 'Bar / Discothèque',
                    'lodging'    => 'Hôtel',
                    'restaurant' => 'Restaurant',
                    'university' => 'Université',
                    'lycee'      => 'Lycée',
                    'office'     => 'Entreprise'
                ),
                'required' => false,
                'attr' => array(
                    'class' => 'establishment'
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
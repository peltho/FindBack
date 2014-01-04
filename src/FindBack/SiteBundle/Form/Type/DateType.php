<?php

namespace FindBack\SiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', 'text', array('label' => false,
                'attr' => array(
                    'placeholder' => 'Quand ?',
                    'class' => 'date'
                )
            ))
            ->add('time', 'text', array('label' => false,
                'attr' => array(
                    'placeholder' => 'À partir de quelle heure ?',
                    'class' => 'time'
                ),
                'required' => false
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FindBack\SiteBundle\Entity\Date',
        ));
    }

    public function getName()
    {
        return 'date';
    }
}
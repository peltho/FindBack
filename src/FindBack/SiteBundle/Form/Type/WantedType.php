<?php

namespace FindBack\SiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WantedType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('place', new PlaceType(), array('label' => false))
            ->add('date', new DateType(), array('label' => false))
            ->add('description', new DescriptionType(), array(/*'required' => false, */'label' => false))
            ->add('circumstances', 'text', array('label' => false,
                'required' => false
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FindBack\SiteBundle\Entity\Wanted',
            'cascade_validation' => true,
        ));
    }

    public function getName()
    {
        return 'wanted';
    }
}
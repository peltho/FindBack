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
            ->add('place', new PlaceType())
            ->add('date')
            ->add('description', new DescriptionType())
            ->add('circumstances');
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
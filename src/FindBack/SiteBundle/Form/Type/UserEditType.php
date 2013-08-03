<?php

namespace FindBack\SiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', array('label' => false))
            ->add('password', 'repeated', array('label' => false,
                'type' => 'password',
                'first_options' => array(
                    'attr' => array(
                        'placeholder' => 'Mot de passe',
                    )
                ),
                'second_options' => array('label' => false,
                    'attr' => array(
                        'placeholder' => 'Confirmez le mot de passe',
                    )
                ),
                'required' => false
            ))
            ->add('gender', 'choice', array('label' => false,
                'choices' => array(
                    'Male'   => 'Homme',
                    'Female' => 'Femme'
                )
            ))
            ->add('facebookPage', 'text', array('label' => false,
                'required' => false
            ))
            ->add('website', 'url', array('label' => false,
                'required' => false
            ))
            ->add('biography', 'textarea', array('label' => false,
                'attr' => array(
                    'placeholder' => 'Parlez de vous !'
                ),
                'required' => false
            ))
            ->add('description', new DescriptionType());
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FindBack\SiteBundle\Entity\User',
            'cascade_validation' => true,
        ));
    }

    public function getName()
    {
        return 'user';
    }
}
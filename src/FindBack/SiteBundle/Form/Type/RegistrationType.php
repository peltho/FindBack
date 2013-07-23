<?php

namespace FindBack\SiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', 'text', array('label' => false,
            'attr' => array(
                'placeholder' => 'Prénom',
            )));
        $builder->add('lastname', 'text', array('label' => false,
            'attr' => array(
                'placeholder' => 'Nom',
            )));
        $builder->add('email', 'email', array('label' => false,
            'attr' => array(
                'placeholder' => 'Adresse email',
            )));
        $builder->add('password', 'repeated', array(
            'type' => 'password',
            'first_options' => array('label' => false,
                'attr' => array(
                    'placeholder' => 'Mot de passe',
                )
            ),
            'second_options' => array('label' => false,
                'attr' => array(
                    'placeholder' => 'Confirmez le mot de passe',
                )
            )
        ));
        $builder->add('birthdate', 'date', array(
            'widget' => 'single_text',
            'input'  => 'datetime',
            'format' => 'dd/MM/yyyy',
            'label'  => false,
            'attr'   => array(
                'placeholder' => 'Date de naissance'
            )
        ));
        $builder->add('gender', 'choice', array(
            'choices'  => array('male' => 'Homme', 'female' => 'Femme'),
            'expanded' => true,
            'label'    => false,
            'attr' => array(
                'class' => 'choice',
            )
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FindBack\SiteBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'registration';
    }
}
<?php
// src/FindBack/SiteBundle/Form/Type/RegistrationFormType.php

namespace FindBack\SiteBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('firstname', null, array('label' => false,
                    'attr' => array(
                        'placeholder' => 'Prénom',
                )))
                ->add('lastname', null, array('label' => false,
                    'attr' => array(
                        'placeholder' => 'Nom',
                )));

        parent::buildForm($builder, $options);

        $builder->add('username', null, array('label' => false))
                ->add('email', 'repeated', array(
                    'type' => 'email',
                    'first_options' => array('label' => false,
                        'attr' => array(
                            'placeholder' => 'E-mail',
                        )
                    ),
                    'second_options' => array('label' => false,
                        'attr' => array(
                            'placeholder' => 'Confirmez l\'e-mail',
                        )
                    )
                ))
                ->add('plainPassword', 'repeated', array(
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
                ))
                /*->add('birthdate', 'genemu_jquerydate', array(
                    'widget' => 'single_text',
                    'label' => false,
                ))*/
                ->add('birthdate', 'date', array('label' => false,
                    'widget' => 'single_text',
                    'input' => 'datetime',
                    'format' => 'dd/MM/yyyy',
                    'attr' => array(
                        'placeholder' => 'Date de naissance'
                    )
                ))
                ->add('gender', 'choice', array(
                    'choices' => array('male' => 'Homme', 'female' => 'Femme'),
                    'expanded' => true,
                    'label' => false,
                    'attr' => array(
                        'class' => 'choice',
                    )
                ))
            ;
    }

    public function getName()
    {
        return 'find_back_user_registration';
    }
}
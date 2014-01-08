<?php

namespace FindBack\SiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DescriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            /*->add('height', 'choice', array('label' => 'Taille',
                'choices' => array(
                    '< 1m40' => '< 1m40',
                    '1m40'   => '1m40',
                    '1m45'   => '1m45',
                    '1m50'   => '1m50',
                    '1m55'   => '1m55',
                    '1m60'   => '1m60',
                    '1m65'   => '1m65',
                    '1m70'   => '1m70',
                    '1m75'   => '1m75',
                    '1m80'   => '1m80',
                    '1m85'   => '1m85',
                    '1m90'   => '1m90',
                    '1m95'   => '1m95',
                    '2m00'   => '2m00',
                    '> 2m00' => '> 2m00'
                ),
                'attr' => array('class' => 'chosen-select', 'data-placeholder' => 'Sélectionnez une taille')
            ))*/
            ->add('gender', 'choice', array('label' => 'Sexe',
                'choices' => array(
                    'Homme' => 'Homme',
                    'Femme' => 'Femme'
                ))
            )
            ->add('height', 'text', array('label' => 'Taille'))
            ->add('type', 'choice', array('label' => 'Origines',
                'choices' => array(
                    'Européen'  => 'Européen',
                    'Asiatique' => 'Asiatique',
                    'Indien'    => 'Indien',
                    'Afro'      => 'Afro',
                    'Métisse'   => 'Métisse',
                    'Maghrébin' => 'Maghrébin'
                )
            ))
            ->add('hairColor', 'choice', array('label' => 'Cheveux',
                'choices' => array(
                    'Noirs'  => 'Noirs',
                    'Bruns'  => 'Bruns',
                    'Blonds' => 'Blonds',
                    'Roux'   => 'Roux',
                    'Blancs' => 'Blancs',
                    'Autre'  => 'Autre'
                ),
                'attr' => array('class' => 'chosen-select', 'data-placeholder' => 'Sélectionnez une couleur')
            ))
            ->add('hairCut', 'choice', array('label' => 'Coupe',
                'choices' => array(
                    'Courts' => 'Courts',
                    'Longs'  => 'Longs'
                )
            ))
            ->add('eyes', 'choice', array('label' => 'Yeux',
                'choices' => array(
                    'NA'      => 'Ne sais pas',
                    'Marrons' => 'Marrons',
                    'Verts'   => 'Verts',
                    'Bleus'   => 'Bleus',
                    'Vérons'  => 'Vérons',
                    'Gris'    => 'Gris',
                    'Jaunes'  => 'Jaunes',
                )
            ))
            ->add('piercing', 'choice', array('label' => 'Piercing',
                'choices' => array(
                    'NA'  => 'Ne sais pas',
                    'Non' => 'Non',
                    'Oui' => 'Oui',
                )
            ))
            ->add('tattoo', 'choice', array('label' => 'Tatouage',
                'choices' => array(
                    'NA'  => 'Ne sais pas',
                    'Non' => 'Non',
                    'Oui' => 'Oui',
                )
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FindBack\SiteBundle\Entity\Description',
        ));
    }

    public function getName()
    {
        return 'description';
    }
}
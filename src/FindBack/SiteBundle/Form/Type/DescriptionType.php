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
            ->add('type', 'choice', array('label' => 'Type',
                'choices' => array(
                    'Européen'  => 'Européen',
                    'Asiatique' => 'Asiatique',
                    'Indien'    => 'Indien',
                    'Afro'      => 'Afro',
                    'Metisse'   => 'Métisse',
                    'Maghrebin' => 'Maghrébin'
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
                    'Attaches' => 'Attachés',
                    'Chauve'  => 'Chauve',
                    'Courts'  => 'Courts',
                    'Rases'   => 'Rasés',
                    'Crepus'  => 'Crépus',
                    'Boucles' => 'Bouclés',
                    'Lisses'  => 'Lisses',
                    'Carre'   => 'Carré',
                    'Chignon' => 'Chignon',
                    'Longs'   => 'Longs',
                    'Cheval'  => 'Queue de cheval',
                    'Degrade' => 'Dégradé',
                    'Frange'  => 'Frange',
                ),
                'attr' => array('class' => 'chosen-select', 'data-placeholder' => 'Sélectionnez une coupe')
            ))
            ->add('beard', 'choice', array('label' => 'Barbe',
                'choices' => array(
                    'None'     => 'Aucune',
                    '3Days'    => 'De 3 jours',
                    'bouc'     => 'Bouc',
                    'mustache' => 'Moustache',
                    'hirsute'  => 'Hirsute',
                    'long'     => 'Longue',
                    'tailored' => 'Taillée'
                ),
                'attr' => array('class' => 'chosen-select', 'data-placeholder' => 'Sélectionnez une barbe')
            ))
            ->add('eyes', 'choice', array('label' => 'Yeux',
                'choices' => array(
                    'Marrons' => 'Marrons',
                    'Verts'   => 'Verts',
                    'Bleus'   => 'Bleus',
                    'Vérons'  => 'Vérons',
                    'Gris'    => 'Gris',
                    'Jaunes'  => 'Jaunes',
                ),
                'attr' => array('class' => 'chosen-select', 'data-placeholder' => 'Sélectionnez une couleur')
            ))
            ->add('piercing', 'choice', array('label' => 'Piercing',
                'choices' => array(
                    'NA'     => 'Ne sais pas',
                    'Non'    => 'Non',
                    'tragus' => 'Tragus',
                    'ecarteur' => 'Écarteur',
                    'arcade'   => 'Arcade',
                    'nose'     => 'Nez',
                    'labbia'   => 'Lèvre',
                    'nuque'    => 'Nuque',
                    'other'    => 'Autre'
                ),
                'attr' => array('class' => 'chosen-select', 'data-placeholder' => 'Sélectionnez un piercing')
            ))
            ->add('earring', 'choice', array('label' => 'Boucles d\'oreilles',
                'choices' => array(
                    'none'    => 'Aucune',
                    'right'   => 'À droite',
                    'left'    => 'À gauche',
                    'both'    => 'Aux deux oreilles',
                    'pendant' => 'Pendantes',
                    'ring'    => 'Anneau',
                    'boule'   => 'Boule',
                    'pierre'  => 'Pierre'
                ),
                'attr' => array('class' => 'chosen-select', 'data-placeholder' => 'Sélectionnez des boucles d\'oreilles')
            ))
            ->add('lipstick', 'choice', array('label' => 'Rouge à lèvres',
                'choices' => array(
                    'none' => 'Aucun',
                    'red'  => 'Rouge',
                    'black' => 'Noir',
                    'rose'  => 'Rose',
                    'other' => 'Autre'
                ),
                'attr' => array('class' => 'chosen-select', 'data-placeholder' => 'Sélectionnez un rouge à lèvres')
            ))
            ->add('tattoo', 'choice', array('label' => 'Tatouage',
                'choices' => array(
                    'NA'  => 'Ne sais pas',
                    'Non' => 'Non',
                    'arms' => 'Bras',
                    'neck' => 'Cou',
                    'face' => 'Visage',
                    'legs' => 'Jambes'
                ),
                'attr' => array('class' => 'chosen-select', 'data-placeholder' => 'Sélectionnez un tatouage')
            ))
            ->add('topClothing', 'choice', array('label' => 'Couleur haut (Vêtement)',
                'choices' => array(
                    'NA'    => 'Ne sais pas',
                    'white' => 'Blanc / beige',
                    'black' => 'Noir',
                    'grey'  => 'Gris',
                    'blue'  => 'Bleu marine / clair',
                    'red'   => 'Rouge / Bordeaux',
                    'green' => 'Vert vif / kaki',
                    'yellow' => 'Jaune',
                    'purple' => 'Violet',
                    'rose'   => 'Rose',
                    'coral'  => 'Corail',
                    'orange' => 'Orange',
                    'maroon' => 'Marron / Taupe',
                ),
                'attr' => array('class' => 'chosen-select', 'data-placeholder' => 'Sélectionnez un haut')
            ))
            ->add('bottomClothing', 'choice', array('label' => 'Couleur bas (Vêtement)',
                'choices' => array(
                    'NA'    => 'Ne sais pas',
                    'white' => 'Blanc / beige',
                    'black' => 'Noir',
                    'grey'  => 'Gris',
                    'blue'  => 'Bleu marine / clair',
                    'red'   => 'Rouge / Bordeaux',
                    'green' => 'Vert vif / kaki',
                    'yellow' => 'Jaune',
                    'purple' => 'Violet',
                    'rose'   => 'Rose',
                    'coral'  => 'Corail',
                    'orange' => 'Orange',
                    'maroon' => 'Marron / Taupe',
                ),
                'attr' => array('class' => 'chosen-select', 'data-placeholder' => 'Sélectionnez un bas')
            ))
        ;
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
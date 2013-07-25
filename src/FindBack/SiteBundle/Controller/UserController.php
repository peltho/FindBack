<?php

namespace FindBack\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function indexAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $firstname = $user->getUsername();
        $lastname  = $user->getLastname();
        $age       = $user->getAge();
        $email     = $user->getEmail();
        $gender       = $user->getGender();
        $facebookPage = $user->getFacebookPage();

        return $this->render('FindBackSiteBundle:User:index.html.twig', array(
            'firstname' => $firstname,
            'lastname'  => $lastname,
            'age'       => $age,
            'email'     => $email,
            'gender'    => $gender,
            'FBPage'    => $facebookPage
        ));
    }
}
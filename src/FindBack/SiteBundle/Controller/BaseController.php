<?php

namespace FindBack\SiteBundle\Controller;

use FindBack\SiteBundle\Entity\Description;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use FindBack\SiteBundle\Form\Type\RegistrationType;
use FindBack\SiteBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class BaseController extends Controller
{
    public function indexAction()
    {
        $securityContext = $this->container->get('security.context');
        if($securityContext->isGranted('IS_AUTHENTICATED_FULLY'))
        {
            return $this->render('FindBackSiteBundle:Base:home.html.twig');
        }
        else
        {
            $request = $this->getRequest();
            $session = $request->getSession();
            // get the login error if there is one
            if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
                $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
            } else {
                $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
                $session->remove(SecurityContext::AUTHENTICATION_ERROR);
            }

            $user = new User();
            $form = $this->createForm(new RegistrationType(), $user, array(
                'action' => $this->generateUrl('register_check'),
            ));

            return $this->render('FindBackSiteBundle:Base:index.html.twig', array(
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,
                'form' => $form->createView()
            ));
        }
    }

    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(new RegistrationType(), new User());

        $form->handleRequest($request);

        if ($form->isValid()) {
            $user = $form->getData();
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword($form->getData()->getPassword(), $user->getSalt());
            $user->setPassword($password);
            $user->setDescription(new Description());
            $em->persist($user);
            $em->flush();

            $registeredGender = ($user->getGender() == "Female") ? "inscrite" : "inscrit";

            $this->get('session')->getFlashBag()->add(
                'notice',
                'Félicitations ! Vous êtes à présent '.$registeredGender.' sur FindBack. Connectez-vous ici →'
            );

            return $this->redirect($this->generateUrl('find_back_site_homepage'));
        }

        return $this->render(
            'FindBackSiteBundle:Base:index.html.twig', array(
                'form' => $form->createView(),
                'error' => null,
                'last_username' => null
            )
        );
    }
}

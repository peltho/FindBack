<?php

namespace FindBack\SiteBundle\Controller;

use FindBack\SiteBundle\Entity\Description;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FindBack\SiteBundle\Form\Type\UserEditType;

class UserController extends Controller
{
    public function indexAction()
    {
        /** @var \FindBack\SiteBundle\Entity\User $user */
        $user = $this->get('security.context')->getToken()->getUser();
        $descriptionRepo = $this->getDoctrine()->getManager()->getRepository('FindBack\SiteBundle\Entity\Description');
        $description = $descriptionRepo->findOneBy(array('user' => $user->getId()));

        $wantedRepo = $this->getDoctrine()->getManager()->getRepository('FindBack\SiteBundle\Entity\Wanted');
        $wanteds = $wantedRepo->findBy(array('user' => $user->getId()));

        return $this->render('FindBackSiteBundle:User:index.html.twig', array(
            'user' => $user,
            'wanteds' => $wanteds,
            'description' => $description
        ));
    }

    public function editAction(Request $request)
    {
        /** @var \FindBack\SiteBundle\Entity\User $user */
        $user = $this->get('security.context')->getToken()->getUser();
        $descriptionRepo = $this->getDoctrine()->getManager()->getRepository('FindBack\SiteBundle\Entity\Description');
        $description = $descriptionRepo->findOneBy(array('user' => $user->getId()));

        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(new UserEditType(), $user);
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {

                $desc = $user->getDescription();
                $desc->setUser($user);
                $em->persist($desc);
                $user->setDescription($desc);

                $em->persist($user);
                $em->flush();

                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'Modifications enregistrées !'
                );

                return $this->redirect($this->generateUrl('account'));
            }
        }

        return $this->render('FindBackSiteBundle:User:edit.html.twig', array(
            'form' => $form->createView(),
            'user' => $user,
            'description' => $description
        ));
    }
}
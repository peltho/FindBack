<?php

namespace FindBack\SiteBundle\Controller;

use Assetic\Factory\Loader\FunctionCallsFormulaLoader;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FindBack\SiteBundle\Form\Type\WantedType;
use FindBack\SiteBundle\Entity\Wanted;

class WantedController extends Controller
{
    public function indexAction()
    {
        $wanted = new Wanted();
        $form = $this->createForm(new WantedType(), $wanted);
        return $this->render('FindBackSiteBundle:Wanted:index.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function publishAction(Request $request)
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $wanted = new Wanted();
        $form = $this->createForm(new WantedType(), $wanted);

        $form->handleRequest($request);
        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $wanted->setUser($user);
                $em->persist($wanted->getDescription());
                $em->persist($wanted->getUser());
                $em->persist($wanted->getPlace());
                $em->persist($wanted->getDate());
                $em->persist($wanted);

                $em->flush();

                return $this->redirect($this->generateUrl('wanted_show', array('id' => $wanted->getId())));
            }
        }
        // OK
        return $this->render('FindBackSiteBundle:Wanted:search.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function showAction($id)
    {
        $wantedRepo = $this->getDoctrine()->getManager()->getRepository('FindBack\SiteBundle\Entity\Wanted');
        $wanted = $wantedRepo->findOneBy(array('id' => $id));
        return $this->render('FindBackSiteBundle:Wanted:show.html.twig', array(
            'wanted' => $wanted
        ));
    }

    public function checkAction(Request $request)
    {
        // TODO
        $wantedRepo = $this->getDoctrine()->getManager()->getRepository('FindBack\SiteBundle\Entity\Wanted');
        $wanted = new Wanted();
        $form = $this->createForm(new WantedType(), $wanted);
        $form->handleRequest($request);

        $result = array();

        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $result = $wantedRepo->search($form->getData());
            }
        }

        return $this->render('FindBackSiteBundle:Wanted:index.html.twig', array(
            'form'    => $form->createView(),
            'results' => $result
        ));
    }
}
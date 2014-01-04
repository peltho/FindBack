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
        $wanted = new Wanted();
        $form = $this->createForm(new WantedType(), $wanted);

        $form->handleRequest($request);
        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($wanted);
                $em->flush();

                return $this->redirect($this->generateUrl('wanted_show', array('id' => $wanted->getId())));
            }
        }

        return $this->render('FindBackSiteBundle:Wanted:search.html.twig', array(
            'form' => $form->createView()
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
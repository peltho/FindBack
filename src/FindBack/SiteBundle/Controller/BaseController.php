<?php

namespace FindBack\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
            return $this->render('FindBackSiteBundle:Base:index.html.twig');
        }
    }
}

<?php

namespace FindBack\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FindBackSiteBundle:Default:index.html.twig');
    }
}

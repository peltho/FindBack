<?php

namespace FindBack\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class WantedController extends Controller
{
    public function indexAction()
    {
        return $this->render('FindBackSiteBundle:Wanted:index.html.twig');
    }

    public function searchAction()
    {
        return $this->render('FindBackSiteBundle:Wanted:search.html.twig');
    }
}
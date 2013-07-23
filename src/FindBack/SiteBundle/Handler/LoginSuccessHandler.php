<?php

namespace FindBack\SiteBundle\Handler;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;
use Doctrine\ORM\EntityManager;

/**
 * Custom authentication success handler
 */
class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    private $router;
    private $em;
    private $container;

    /**
     * Constructor
     * @param RouterInterface   $router
     * @param EntityManager     $em
     */
    public function __construct(RouterInterface $router, EntityManager $em, $container)
    {
        $this->router = $router;
        $this->em = $em;
        $this->container = $container;
    }

    /**
     * This is called when an interactive authentication attempt succeeds. This
     * is called by authentication listeners inheriting from AbstractAuthenticationListener.
     * @param Request        $request
     * @param TokenInterface $token
     * @return Response The response to return
     */
    function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        /*$user = $this->get('security.context')->getToken()->getUser();
        $username = $user->getUsername();*/

        $username = $token->getUser()->getUsername();
        $this->container->get('session')->getFlashBag()->add(
            'notice',
            'Bienvenue '.$username.' !'
        );

        return new RedirectResponse($this->router->generate('find_back_site_homepage'));
    }
}
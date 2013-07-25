<?php

namespace FindBack\SiteBundle\Entity;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use FindBack\SiteBundle\Entity\User;
use \BaseFacebook;
use \FacebookApiException;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Validation;

class FacebookProvider implements UserProviderInterface
{
    /**
     * @var \Facebook
     */
    protected $facebook;
    protected $em;
    protected $validator;

    public function __construct(BaseFacebook $facebook, EntityManager $em, $validator)
    {
        $this->facebook = $facebook;
        $this->em = $em;
        $this->validator = $validator;
    }

    /**
     * @param string $fbId
     * @return User|mixed|UserInterface
     * @throws \Symfony\Component\Security\Core\Exception\UsernameNotFoundException
     */
    public function loadUserByUsername($fbId)
    {
        $user = $this->em->getRepository('FindBack\SiteBundle\Entity\User')->findOneBy(array('facebookId' => $fbId));

        try {
            $fbdata = $this->facebook->api('/me');
        } catch (FacebookApiException $e) {
            $fbdata = null;
        }

        if (!empty($fbdata)) {
            if (empty($user)) {
                $user = $this->em->getRepository('FindBack\SiteBundle\Entity\User')->findOneBy(array('email' => $fbdata['email']));
                if($user)
                {
                    $user->setFacebookId($fbdata['id']);
                }
                else
                {
                    $user = new User();
                    $user->setEmail($fbdata['email']);
                    $user->setPassword('');
                }
            }

            $user->setFBData($fbdata);
            $birthdate = $fbdata['birthday'];
            $birthdate = explode('/', $birthdate);
            $birthYear = $birthdate[2];
            if($birthYear > 1995)
            {
                throw new UsernameNotFoundException('Vous devez être majeur pour pouvoir vous connecter !');
            }

            $this->em->persist($user);
            $this->em->flush();
        }

        if (empty($user)) {
            throw new UsernameNotFoundException('Vous n\'êtes pas authentifié sur Facebook.');
        }

        return $user;
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$this->supportsClass(get_class($user)) || !$user->getFacebookId()) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $this->loadUserByUsername($user->getFacebookId());
    }

    public function supportsClass($class)
    {
        return $this->em->getClassMetadata(get_class($this))->getName() === $class
        || is_subclass_of($class, $this->em->getClassMetadata(get_class($this))->getName());
    }
}
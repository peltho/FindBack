<?php

namespace FindBack\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

class User implements AdvancedUserInterface, EquatableInterface, \Serializable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $email;

    /**
     * @var \DateTime
     */
    private $birthdate;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var string
     */
    private $salt;

    /**
     * @var boolean
     */
    private $isActive;

    /**
     * @var string
     */
    protected $facebookId;

    /**
     * @var string
     */
    private $facebookPage;

    /**
     * @var \FindBack\SiteBundle\Entity\Description
     */
    private $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $wanteds;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $places;

    /**
     * @var string
     */
    private $website;

    /**
     * @var integer
     */
    private $found;

    /**
     * @var string
     */
    private $biography;

    public function __construct()
    {
        $this->isActive = true;
        //$this->setDescription(new \FindBack\SiteBundle\Entity\Description());
        //$this->salt = md5(uniqid(null, true));
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return User
     */
    public function setBirthdate(\DateTime $birthdate)
    {
        $this->birthdate = $birthdate;
    
        return $this;
    }

    /**
     * @return \DateInterval
     */
    public function getAge()
    {
        if(isset($this->birthdate))
        {
            $interval = $this->birthdate->diff(new \DateTime());
            return $interval->y;
        }
        return false;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return User
     */
    public function setGender($gender)
    {
        if($this->getDescription() == null) {
            $this->gender = $gender;
        }
        else {
            $this->getDescription()->setGender($gender);
        }
    
        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        if($this->getDescription() == null) {
            $gender = $this->gender;
        }
        else {
            $gender = $this->getDescription()->getGender();
        }
        return $gender;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        //return $this->salt;
        return null;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @return array|\Symfony\Component\Security\Core\User\Role[]
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * @param UserInterface $user
     * @return bool
     */
    public function isEqualTo(UserInterface $user)
    {
        if (!$user instanceof User) {
            return false;
        }

        if ($this->password !== $user->getPassword()) {
            return false;
        }

        if ($this->getSalt() !== $user->getSalt()) {
            return false;
        }

        if ($this->username !== $user->getUsername()) {
            return false;
        }

        return true;
    }

    public function eraseCredentials()
    {
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->isActive;
    }

    /**
     * Serializes the user.
     *
     * The serialized data have to contain the fields used by the equals method and the username.
     *
     * @return string
     */
    public function serialize()
    {
        return serialize(array(
            $this->password,
            //$this->salt,
            $this->username,
            $this->isActive,
            $this->gender,
            $this->email,
            $this->birthdate,
            $this->facebookId,
            $this->lastname,
            $this->id
        ));
    }

    /**
     * Unserializes the user.
     *
     * @param string $serialized
     */
    public function unserialize($serialized)
    {
        $data = unserialize($serialized);
        // add a few extra elements in the array to ensure that we have enough keys when unserializing
        // older data which does not include all properties.
        $data = array_merge($data, array_fill(0, 2, null));

        list(
            $this->password,
            //$this->salt,
            $this->username,
            $this->isActive,
            $this->gender,
            $this->email,
            $this->birthdate,
            $this->facebookId,
            $this->lastname,
            $this->id
            ) = $data;
    }

    /**
     * Get the full name of the user (first + last name)
     * @return string
     */
    public function getFullName()
    {
        return $this->getUsername() . ' ' . $this->getLastname();
    }

    /**
     * @param string $facebookId
     * @return void
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;
        $this->setUsername($facebookId);
    }

    /**
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * @param Array
     */
    public function setFBData($fbdata)
    {
        if (isset($fbdata['id'])) {
            $this->setFacebookId($fbdata['id']);
        }
        if (isset($fbdata['first_name'])) {
            $this->setUsername($fbdata['first_name']);
        }
        if (isset($fbdata['last_name'])) {
            $this->setLastname($fbdata['last_name']);
        }
        if (isset($fbdata['gender'])) {
            $this->setGender($fbdata['gender']);
        }
        if (isset($fbdata['birthday'])) {
            $birthdate = new \DateTime($fbdata['birthday']);
            $this->setBirthdate($birthdate);
        }
        if (isset($fbdata['link'])) {
            $this->setFacebookPage($fbdata['link']);
        }
    }

    /**
     * Set facebookPage
     *
     * @param string $facebookPage
     * @return User
     */
    public function setFacebookPage($facebookPage)
    {
        $this->facebookPage = $facebookPage;
    
        return $this;
    }

    /**
     * Get facebookPage
     *
     * @return string 
     */
    public function getFacebookPage()
    {
        return $this->facebookPage;
    }

    /**
     * Set description
     *
     * @param \FindBack\SiteBundle\Entity\Description $description
     * @return User
     */
    public function setDescription(\FindBack\SiteBundle\Entity\Description $description = null)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return \FindBack\SiteBundle\Entity\Description 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add wanteds
     *
     * @param \FindBack\SiteBundle\Entity\Wanted $wanteds
     * @return User
     */
    public function addWanted(\FindBack\SiteBundle\Entity\Wanted $wanteds)
    {
        $this->wanteds[] = $wanteds;
    
        return $this;
    }

    /**
     * Remove wanteds
     *
     * @param \FindBack\SiteBundle\Entity\Wanted $wanteds
     */
    public function removeWanted(\FindBack\SiteBundle\Entity\Wanted $wanteds)
    {
        $this->wanteds->removeElement($wanteds);
    }

    /**
     * Get wanteds
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWanteds()
    {
        return $this->wanteds;
    }

    /**
     * Get counter of wanteds
     *
     * @return int
     */
    public function getNbWanteds()
    {
        return count($this->wanteds);
    }

    /**
     * Add places
     *
     * @param \FindBack\SiteBundle\Entity\Place $places
     * @return User
     */
    public function addPlace(\FindBack\SiteBundle\Entity\Place $places)
    {
        $this->places[] = $places;
    
        return $this;
    }

    /**
     * Remove places
     *
     * @param \FindBack\SiteBundle\Entity\Place $places
     */
    public function removePlace(\FindBack\SiteBundle\Entity\Place $places)
    {
        $this->places->removeElement($places);
    }

    /**
     * Get places
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlaces()
    {
        return $this->places;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return User
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    
        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set found
     *
     * @param integer $found
     * @return User
     */
    public function setFound($found)
    {
        $this->found = $found;
    
        return $this;
    }

    /**
     * Get found
     *
     * @return integer 
     */
    public function getFound()
    {
        return count($this->found);
    }

    /**
     * Set biography
     *
     * @param string $biography
     * @return User
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;
    
        return $this;
    }

    /**
     * Get biography
     *
     * @return string 
     */
    public function getBiography()
    {
        return $this->biography;
    }
}

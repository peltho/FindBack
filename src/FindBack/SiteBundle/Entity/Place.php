<?php

namespace FindBack\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Place
 */
class Place
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $formattedAddress;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $location;

    /**
     * @var string
     */
    private $establishmentName;

    /**
     * @var string
     */
    private $establishmentType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $wanteds;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $users;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->wanteds = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set formattedAddress
     *
     * @param string $formattedAddress
     * @return Place
     */
    public function setFormattedAddress($formattedAddress)
    {
        $this->formattedAddress = $formattedAddress;
    
        return $this;
    }

    /**
     * Get formattedAddress
     *
     * @return string 
     */
    public function getFormattedAddress()
    {
        return $this->formattedAddress;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Place
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return Place
     */
    public function setStreet($street)
    {
        $this->street = $street;
    
        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Place
     */
    public function setLocation($location)
    {
        $this->location = $location;
    
        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set establishmentName
     *
     * @param string $establishmentName
     * @return Place
     */
    public function setEstablishmentName($establishmentName)
    {
        $this->establishmentName = $establishmentName;
    
        return $this;
    }

    /**
     * Get establishmentName
     *
     * @return string 
     */
    public function getEstablishmentName()
    {
        return $this->establishmentName;
    }

    /**
     * Set establishmentType
     *
     * @param string $establishmentType
     * @return Place
     */
    public function setEstablishmentType($establishmentType)
    {
        $this->establishmentType = $establishmentType;
    
        return $this;
    }

    /**
     * Get establishmentType
     *
     * @return string 
     */
    public function getEstablishmentType()
    {
        return $this->establishmentType;
    }

    /**
     * Add wanteds
     *
     * @param \FindBack\SiteBundle\Entity\Wanted $wanteds
     * @return Place
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
     * Add users
     *
     * @param \FindBack\SiteBundle\Entity\User $users
     * @return Place
     */
    public function addUser(\FindBack\SiteBundle\Entity\User $users)
    {
        $this->users[] = $users;
    
        return $this;
    }

    /**
     * Remove users
     *
     * @param \FindBack\SiteBundle\Entity\User $users
     */
    public function removeUser(\FindBack\SiteBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}

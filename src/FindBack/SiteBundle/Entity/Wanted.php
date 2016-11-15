<?php

namespace FindBack\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wanted
 */
class Wanted
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $circumstances;

    /**
     * @var \FindBack\SiteBundle\Entity\User
     */
    private $user;

    /**
     * @var \FindBack\SiteBundle\Entity\Description
     */
    private $description;

    /**
     * @var \FindBack\SiteBundle\Entity\Place
     */
    private $place;

    /**
     * @var \FindBack\SiteBundle\Entity\Date
     */
    private $date;


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
     * Set circumstances
     *
     * @param string $circumstances
     * @return Wanted
     */
    public function setCircumstances($circumstances)
    {
        $this->circumstances = $circumstances;
    
        return $this;
    }

    /**
     * Get circumstances
     *
     * @return string 
     */
    public function getCircumstances()
    {
        return $this->circumstances;
    }

    /**
     * Set user
     *
     * @param \FindBack\SiteBundle\Entity\User $user
     * @return Wanted
     */
    public function setUser(\FindBack\SiteBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \FindBack\SiteBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set description
     *
     * @param \FindBack\SiteBundle\Entity\Description $description
     * @return Wanted
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
     * Set place
     *
     * @param \FindBack\SiteBundle\Entity\Place $place
     * @return Wanted
     */
    public function setPlace(\FindBack\SiteBundle\Entity\Place $place = null)
    {
        $this->place = $place;
    
        return $this;
    }

    /**
     * Get place
     *
     * @return \FindBack\SiteBundle\Entity\Place 
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set date
     *
     * @param \FindBack\SiteBundle\Entity\Date $date
     * @return Wanted
     */
    public function setDate(\FindBack\SiteBundle\Entity\Date $date = null)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \FindBack\SiteBundle\Entity\Date 
     */
    public function getDate()
    {
        return $this->date;
    }
}

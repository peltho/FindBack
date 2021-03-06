<?php

namespace FindBack\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Date
 */
class Date
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $date;

    /**
     * @var string
     */
    private $time;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $wanteds;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->wanteds = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set date
     *
     * @param string $date
     * @return Date
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return string 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set time
     *
     * @param string $time
     * @return Date
     */
    public function setTime($time)
    {
        $this->time = $time;
    
        return $this;
    }

    /**
     * Get time
     *
     * @return string 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Add wanteds
     *
     * @param \FindBack\SiteBundle\Entity\Wanted $wanteds
     * @return Date
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
}

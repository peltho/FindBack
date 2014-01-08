<?php

namespace FindBack\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description
 */
class Description
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var string
     */
    private $height;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $hairColor;

    /**
     * @var string
     */
    private $hairCut;

    /**
     * @var string
     */
    private $eyes;

    /**
     * @var string
     */
    private $piercing;

    /**
     * @var string
     */
    private $tattoo;

    /**
     * @var \FindBack\SiteBundle\Entity\User
     */
    private $user;


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
     * Set height
     *
     * @param string $height
     * @return Description
     */
    public function setHeight($height)
    {
        $this->height = $height;
    
        return $this;
    }

    /**
     * Get height
     *
     * @return string 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Description
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set hairColor
     *
     * @param string $hairColor
     * @return Description
     */
    public function setHairColor($hairColor)
    {
        $this->hairColor = $hairColor;
    
        return $this;
    }

    /**
     * Get hairColor
     *
     * @return string 
     */
    public function getHairColor()
    {
        return $this->hairColor;
    }

    /**
     * Set hairCut
     *
     * @param string $hairCut
     * @return Description
     */
    public function setHairCut($hairCut)
    {
        $this->hairCut = $hairCut;
    
        return $this;
    }

    /**
     * Get hairCut
     *
     * @return string 
     */
    public function getHairCut()
    {
        return $this->hairCut;
    }

    /**
     * Set eyes
     *
     * @param string $eyes
     * @return Description
     */
    public function setEyes($eyes)
    {
        $this->eyes = $eyes;
    
        return $this;
    }

    /**
     * Get eyes
     *
     * @return string 
     */
    public function getEyes()
    {
        return $this->eyes;
    }

    /**
     * Set user
     *
     * @param \FindBack\SiteBundle\Entity\User $user
     * @return Description
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
     * Set piercing
     *
     * @param string $piercing
     * @return Description
     */
    public function setPiercing($piercing)
    {
        $this->piercing = $piercing;
    
        return $this;
    }

    /**
     * Get piercing
     *
     * @return string 
     */
    public function getPiercing()
    {
        return $this->piercing;
    }

    /**
     * Set tattoo
     *
     * @param string $tattoo
     * @return Description
     */
    public function setTattoo($tattoo)
    {
        $this->tattoo = $tattoo;
    
        return $this;
    }

    /**
     * Get tattoo
     *
     * @return string 
     */
    public function getTattoo()
    {
        return $this->tattoo;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Description
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    
        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

}
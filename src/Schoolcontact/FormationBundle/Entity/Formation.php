<?php

namespace Schoolcontact\FormationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Schoolcontact\FormationBundle\Entity\Ecole;
use Doctrine\Common\Collections\ArrayCollection;
use Schoolcontact\FormationBundle\Entity\Opinion;

/**
 * Formation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Schoolcontact\FormationBundle\Entity\FormationRepository")
 */
class Formation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="duree", type="integer")
     */
    private $duree;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="format", type="boolean")
     */
    private $format;

    /**
     * @ORM\ManyToOne(targetEntity="Schoolcontact\FormationBundle\Entity\Ecole", inversedBy="formations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ecole;

    /**
     * @ORM\OneToMany(targetEntity="Schoolcontact\FormationBundle\Entity\Opinion", mappedBy="formation")
     */
    private $opinions;


    public function __construct() {
        $this->opinions = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Formation
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Formation
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
     * Set duree
     *
     * @param integer $duree
     * @return Formation
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;
    
        return $this;
    }

    /**
     * Get duree
     *
     * @return integer 
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Formation
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set format
     *
     * @param boolean $format
     * @return Formation
     */
    public function setFormat($format)
    {
        $this->format = $format;
    
        return $this;
    }

    /**
     * Get format
     *
     * @return boolean 
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set ecole
     *
     * @param Ecole $ecole
     */
    public function setEcole(Ecole $ecole)
    {
        $this->ecole = $ecole;
    }

    /**
     * Get ecole
     *
     * @return Ecole 
     */
    public function getEcole()
    {
        return $this->ecole;
    }

    /**
     * add opinion
     *
     * @return ArrayCollection 
     */
    public function addOpinion(Opinion $opinion)
    {
        $this->opinions[] = $opinion;
        $opinion->setFormation($this);
        return $this;
    }

    /**
     * remove opinion
     */ 
    public function removeOpinion(Opinion $opinion)
    {
        $this->formations->removeElement($opinion);
        // Et si notre relation était facultative (nullable=true, ce qui n'est pas notre cas ici attention) :        
        // $formation->setDepartement(null);
    }

    /**
     * Get opinions
     *
     * @return ArrayCollection 
     */ 
    public function getOpinions()
    {
        return $this->opinions;
    }
}

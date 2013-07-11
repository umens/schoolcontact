<?php

namespace Schoolcontact\FormationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Schoolcontact\FormationBundle\Entity\Region;
use Schoolcontact\FormationBundle\Entity\Ville;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Departement
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Schoolcontact\FormationBundle\Entity\DepartementRepository")
 */
class Departement
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
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var integer
     *
     * @ORM\Column(name="code", type="integer")
     */
    private $code;

    /**
     * @ORM\ManyToOne(targetEntity="Schoolcontact\FormationBundle\Entity\Region", inversedBy="departements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $region;

    /**
     * @ORM\OneToMany(targetEntity="Schoolcontact\FormationBundle\Entity\Ville", mappedBy="departement")
     */
    private $villes;

    public function __construct()
    {
        $this->villes = new ArrayCollection();
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
     * @return Departement
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
     * Set code
     *
     * @param integer $code
     * @return Departement
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return integer 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set region
     *
     * @param Region $region
     */
    public function setRegion(Region $region)
    {
        $this->region = $region;
    }

    /**
     * Get region
     *
     * @return Region 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * add ville
     *
     * @return ArrayCollection 
     */
    public function addVille(Ville $ville)
    {
        $this->villes[] = $ville;
        $ville->setDepartement($this);
        return $this;
    }

    /**
     * remove ville
     */ 
    public function removeVille(Ville $ville)
    {
        $this->villes->removeElement($ville);
        // Et si notre relation était facultative (nullable=true, ce qui n'est pas notre cas ici attention) :        
        // $ville->setDepartement(null);
    }

    /**
     * Get villes
     *
     * @return ArrayCollection 
     */ 
    public function getVilles()
    {
        return $this->villes;
    }
}

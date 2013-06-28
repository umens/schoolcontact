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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

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
     * Set nom
     *
     * @param string $nom
     * @return Departement
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     * @return Departement
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    
        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
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

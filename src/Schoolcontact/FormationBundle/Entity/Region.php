<?php

namespace Schoolcontact\FormationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Schoolcontact\FormationBundle\Entity\Departement;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Region
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Schoolcontact\FormationBundle\Entity\RegionRepository")
 */
class Region
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
     * @ORM\OneToMany(targetEntity="Schoolcontact\FormationBundle\Entity\Departement", mappedBy="region")
     */
    private $departements;

    public function __construct()
    {
        $this->departements = new ArrayCollection();
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
     * @return Region
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
     * add departement
     *
     * @return ArrayCollection 
     */
    public function addDepartement(Departement $departement)
    {
        $this->departements[] = $departement;
        $departement->setRegion($this);
        return $this;
    }

    /**
     * remove departement
     */ 
    public function removeDepartement(Departement $departement)
    {
        $this->departements->removeElement($departement);
        // Et si notre relation était facultative (nullable=true, ce qui n'est pas notre cas ici attention) :        
        // $departement->setRegion(null);
    }

    /**
     * Get departements
     *
     * @return ArrayCollection 
     */ 
    public function getDepartements()
    {
        return $this->departements;
    }
}

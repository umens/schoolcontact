<?php

namespace Schoolcontact\FormationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Schoolcontact\FormationBundle\Entity\Departement;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Ville
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Schoolcontact\FormationBundle\Entity\VilleRepository")
 */
class Ville
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
     * @ORM\Column(name="cp", type="integer")
     */
    private $cp;

    /**
     * @ORM\ManyToOne(targetEntity="Schoolcontact\FormationBundle\Entity\Departement", inversedBy="villes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $departement;

    /**
     * @ORM\ManyToMany(targetEntity="Schoolcontact\FormationBundle\Entity\Ecole", inversedBy="villes")
     * @ORM\JoinTable(name="villes_ecoles")
     */
    private $ecoles;

    public function __construct() {
        $this->ecoles = new ArrayCollection();
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
     * @return Ville
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
     * Set cp
     *
     * @param integer $cp
     * @return Ville
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    
        return $this;
    }

    /**
     * Get cp
     *
     * @return integer 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set departement
     *
     * @param Departement $departement
     */
    public function setDepartement(Departement $departement)
    {
        $this->departement = $departement;
    }

    /**
     * Get departement
     *
     * @return Departement 
     */
    public function getDepartement()
    {
        return $this->departement;
    }
}

<?php

namespace Schoolcontact\FormationBundle\Entity
 
use Doctrine\ORM\Mapping as ORM;
use Schoolcontact\FormationBundle\Entity\Ecole;
use Schoolcontact\FormationBundle\Entity\Site;
 
/**
 * EcoleSite
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class EcoleSite
{
  /**
   * @ORM\Id
   * @ORM\ManyToOne(targetEntity="Schoolcontact\FormationBundle\Entity\Ecole")
   */
  private $ecole;
 
  /**
   * @ORM\Id
   * @ORM\ManyToOne(targetEntity="Schoolcontact\FormationBundle\Entity\Site")
   */
  private $site;
 
  /**
   * @var string
   *
   * @ORM\Column(name="adresse", type="string", length=255)
   */
  private $adresse;

  /**
   * @var string
   *
   * @ORM\Column(name="coordonnees", type="string", length=255)
   */
  private $coordonnees;

  /**
   * Set ecole
   *
   * @param Ecole $ecole
   * @return EcoleSite
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
   * Set site
   *
   * @param Site $site
   * @return EcoleSite
   */
  public function setSite(Site $site)
  {
    $this->site = $site;
  }

  /**
   * Get site
   *
   * @return Site 
   */
  public function getSite()
  {
    return $this->site;
  }
 
  /**
   * Set adresse
   *
   * @param string $adresse
   * @return EcoleSite
   */
  public function setAdresse($adresse)
  {
    $this->adresse = $adresse;

    return $this;
  }

  /**
   * Get adresse
   *
   * @return string 
   */
  public function getAdresse()
  {
    return $this->adresse;
  }

  /**
   * Set coordonnees
   *
   * @param string $coordonnees
   * @return EcoleSite
   */
  public function setCoordonnees($coordonnees)
  {
    $this->coordonnees = $coordonnees;

    return $this;
  }

  /**
   * Get coordonnees
   *
   * @return string 
   */
  public function getCoordonnees()
  {
    return $this->coordonnees;
  }
}
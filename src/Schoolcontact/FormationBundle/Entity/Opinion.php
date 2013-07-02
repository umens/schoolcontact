<?php

namespace Schoolcontact\FormationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Schoolcontact\FormationBundle\Entity\Formation;

/**
 * Opinion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Schoolcontact\FormationBundle\Entity\OpinionRepository")
 */
class Opinion
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
     * @ORM\Column(name="message", type="text")
     */
    private $message;

    /**
     * @var integer
     *
     * @ORM\Column(name="note", type="smallint")
     */
    private $note;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Schoolcontact\FormationBundle\Entity\Formation", inversedBy="opinions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $formation;


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
     * Set message
     *
     * @param string $message
     * @return Opinion
     */
    public function setMessage($message)
    {
        $this->message = $message;
    
        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set note
     *
     * @param integer $note
     * @return Opinion
     */
    public function setNote($note)
    {
        $this->note = $note;
    
        return $this;
    }

    /**
     * Get note
     *
     * @return integer 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Opinion
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set formation
     *
     * @param Formation $formation
     */
    public function setFormation(Formation $formation)
    {
        $this->formation = $formation;
    }

    /**
     * Get formation
     *
     * @return Formation 
     */
    public function getEcole()
    {
        return $this->formation;
    }
}

<?php

namespace Exemple\AnnotationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livre
 *
 * @ORM\Table(name="livre", uniqueConstraints={@ORM\UniqueConstraint(name="leslug_UNIQUE", columns={"leslug"})})
 * @ORM\Entity
 */
class Livre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="letitre", type="string", length=150, nullable=false)
     */
    private $letitre;

    /**
     * @var string
     *
     * @ORM\Column(name="leslug", type="string", length=150, nullable=true)
     */
    private $leslug;

    /**
     * @var string
     *
     * @ORM\Column(name="leresume", type="text", length=65535, nullable=false)
     */
    private $leresume;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="laparution", type="date", nullable=false)
     */
    private $laparution;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Auteur")
     * @ORM\JoinTable(name="auteur_has_livre")
     */
    private $auteur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->auteur = new \Doctrine\Common\Collections\ArrayCollection();
        
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
     * Set letitre
     *
     * @param string $letitre
     *
     * @return Livre
     */
    public function setLetitre($letitre)
    {
        $this->letitre = $letitre;

        return $this;
    }

    /**
     * Get letitre
     *
     * @return string
     */
    public function getLetitre()
    {
        return $this->letitre;
    }

    /**
     * Set leslug
     *
     * @param string $leslug
     *
     * @return Livre
     */
    public function setLeslug($leslug)
    {
        $this->leslug = $leslug;

        return $this;
    }

    /**
     * Get leslug
     *
     * @return string
     */
    public function getLeslug()
    {
        return $this->leslug;
    }

    /**
     * Set leresume
     *
     * @param string $leresume
     *
     * @return Livre
     */
    public function setLeresume($leresume)
    {
        $this->leresume = $leresume;

        return $this;
    }

    /**
     * Get leresume
     *
     * @return string
     */
    public function getLeresume()
    {
        return $this->leresume;
    }

    /**
     * Set laparution
     *
     * @param \DateTime $laparution
     *
     * @return Livre
     */
    public function setLaparution($laparution)
    {
        $this->laparution = $laparution;

        return $this;
    }

    /**
     * Get laparution
     *
     * @return \DateTime
     */
    public function getLaparution()
    {
        return $this->laparution;
    }

    /**
     * Add auteur
     *
     * @param \Exemple\AnnotationBundle\Entity\Auteur $auteur
     *
     * @return Livre
     */
    public function addAuteur(\Exemple\AnnotationBundle\Entity\Auteur $auteur)
    {
        $this->auteur[] = $auteur;

        return $this;
    }

    /**
     * Remove auteur
     *
     * @param \Exemple\AnnotationBundle\Entity\Auteur $auteur
     */
    public function removeAuteur(\Exemple\AnnotationBundle\Entity\Auteur $auteur)
    {
        $this->auteur->removeElement($auteur);
    }

    /**
     * Get auteur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAuteur()
    {
        return $this->auteur;
    }
}

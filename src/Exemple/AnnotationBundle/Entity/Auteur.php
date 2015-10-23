<?php

namespace Exemple\AnnotationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Auteur
 *
 * @ORM\Table(name="auteur")
 * @ORM\Entity
 */
class Auteur
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
     * @ORM\Column(name="lenom", type="string", length=120, nullable=false)
     */
    private $lenom;

    /**
     * @var string
     *
     * @ORM\Column(name="leprenom", type="string", length=120, nullable=false)
     */
    private $leprenom;

    /**
     * @var string
     *
     * @ORM\Column(name="labio", type="text", length=65535, nullable=true)
     */
    private $labio;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Livre")
     * @ORM\JoinTable(name="auteur_has_livre")
     */
    private $livre;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->livre = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set lenom
     *
     * @param string $lenom
     *
     * @return Auteur
     */
    public function setLenom($lenom)
    {
        $this->lenom = $lenom;

        return $this;
    }

    /**
     * Get lenom
     *
     * @return string
     */
    public function getLenom()
    {
        return $this->lenom;
    }

    /**
     * Set leprenom
     *
     * @param string $leprenom
     *
     * @return Auteur
     */
    public function setLeprenom($leprenom)
    {
        $this->leprenom = $leprenom;

        return $this;
    }

    /**
     * Get leprenom
     *
     * @return string
     */
    public function getLeprenom()
    {
        return $this->leprenom;
    }

    /**
     * Set labio
     *
     * @param string $labio
     *
     * @return Auteur
     */
    public function setLabio($labio)
    {
        $this->labio = $labio;

        return $this;
    }

    /**
     * Get labio
     *
     * @return string
     */
    public function getLabio()
    {
        return $this->labio;
    }

    /**
     * Add livre
     *
     * @param \Exemple\AnnotationBundle\Entity\Livre $livre
     *
     * @return Auteur
     */
    public function addLivre(\Exemple\AnnotationBundle\Entity\Livre $livre)
    {
        $this->livre[] = $livre;

        return $this;
    }

    /**
     * Remove livre
     *
     * @param \Exemple\AnnotationBundle\Entity\Livre $livre
     */
    public function removeLivre(\Exemple\AnnotationBundle\Entity\Livre $livre)
    {
        $this->livre->removeElement($livre);
    }

    /**
     * Get livre
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLivre()
    {
        return $this->livre;
    }
}

<?php

namespace Exemple\AnnotationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire", indexes={@ORM\Index(name="fk_commentaire_livre1_idx", columns={"livre_id"})})
 * @ORM\Entity
 */
class Commentaire
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
     * @ORM\Column(name="lutil", type="string", length=60, nullable=false)
     */
    private $lutil;

    /**
     * @var string
     *
     * @ORM\Column(name="letexte", type="string", length=500, nullable=false)
     */
    private $letexte;

    /**
     * @var string
     *
     * @ORM\Column(name="lemail", type="string", length=150, nullable=false)
     */
    private $lemail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lheure", type="datetime", nullable=false)
     */
    private $lheure;

    /**
     * @var \Livre
     *
     * @ORM\ManyToOne(targetEntity="Livre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="livre_id", referencedColumnName="id")
     * })
     */
    private $livre;



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
     * Set lutil
     *
     * @param string $lutil
     *
     * @return Commentaire
     */
    public function setLutil($lutil)
    {
        $this->lutil = $lutil;

        return $this;
    }

    /**
     * Get lutil
     *
     * @return string
     */
    public function getLutil()
    {
        return $this->lutil;
    }

    /**
     * Set letexte
     *
     * @param string $letexte
     *
     * @return Commentaire
     */
    public function setLetexte($letexte)
    {
        $this->letexte = $letexte;

        return $this;
    }

    /**
     * Get letexte
     *
     * @return string
     */
    public function getLetexte()
    {
        return $this->letexte;
    }

    /**
     * Set lemail
     *
     * @param string $lemail
     *
     * @return Commentaire
     */
    public function setLemail($lemail)
    {
        $this->lemail = $lemail;

        return $this;
    }

    /**
     * Get lemail
     *
     * @return string
     */
    public function getLemail()
    {
        return $this->lemail;
    }

    /**
     * Set lheure
     *
     * @param \DateTime $lheure
     *
     * @return Commentaire
     */
    public function setLheure($lheure)
    {
        $this->lheure = $lheure;

        return $this;
    }

    /**
     * Get lheure
     *
     * @return \DateTime
     */
    public function getLheure()
    {
        return $this->lheure;
    }

    /**
     * Set livre
     *
     * @param \Exemple\AnnotationBundle\Entity\Livre $livre
     *
     * @return Commentaire
     */
    public function setLivre(\Exemple\AnnotationBundle\Entity\Livre $livre = null)
    {
        $this->livre = $livre;

        return $this;
    }

    /**
     * Get livre
     *
     * @return \Exemple\AnnotationBundle\Entity\Livre
     */
    public function getLivre()
    {
        return $this->livre;
    }
}

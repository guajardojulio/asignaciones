<?php

namespace Acme\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prevision
 *
 * @ORM\Table(name="prevision")
 * @ORM\Entity
 */
class Prevision
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_prevision", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idPrevision;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_prevision", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $nombrePrevision;



    /**
     * Set idPrevision
     *
     * @param integer $idPrevision
     *
     * @return Prevision
     */
    public function setIdPrevision($idPrevision)
    {
        $this->idPrevision = $idPrevision;

        return $this;
    }

    /**
     * Get idPrevision
     *
     * @return integer
     */
    public function getIdPrevision()
    {
        return $this->idPrevision;
    }

    /**
     * Set nombrePrevision
     *
     * @param string $nombrePrevision
     *
     * @return Prevision
     */
    public function setNombrePrevision($nombrePrevision)
    {
        $this->nombrePrevision = $nombrePrevision;

        return $this;
    }

    /**
     * Get nombrePrevision
     *
     * @return string
     */
    public function getNombrePrevision()
    {
        return $this->nombrePrevision;
    }
}

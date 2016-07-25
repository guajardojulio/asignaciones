<?php

namespace Acme\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Examen
 *
 * @ORM\Table(name="examen", indexes={@ORM\Index(name="codigo_examen", columns={"codigo_examen"})})
 * @ORM\Entity
 */
class Examen
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_examen", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idExamen;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_examen", type="string", length=10, nullable=false)
     */
    private $codigoExamen;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_examen", type="string", length=50, nullable=false)
     */
    private $nombreExamen;

    /**
     * @var integer
     *
     * @ORM\Column(name="valor_examen", type="integer", nullable=false)
     */
    private $valorExamen;



    /**
     * Get idExamen
     *
     * @return integer
     */
    public function getIdExamen()
    {
        return $this->idExamen;
    }

    /**
     * Set codigoExamen
     *
     * @param string $codigoExamen
     *
     * @return Examen
     */
    public function setCodigoExamen($codigoExamen)
    {
        $this->codigoExamen = $codigoExamen;

        return $this;
    }

    /**
     * Get codigoExamen
     *
     * @return string
     */
    public function getCodigoExamen()
    {
        return $this->codigoExamen;
    }

    /**
     * Set nombreExamen
     *
     * @param string $nombreExamen
     *
     * @return Examen
     */
    public function setNombreExamen($nombreExamen)
    {
        $this->nombreExamen = $nombreExamen;

        return $this;
    }

    /**
     * Get nombreExamen
     *
     * @return string
     */
    public function getNombreExamen()
    {
        return $this->nombreExamen;
    }

    /**
     * Set valorExamen
     *
     * @param integer $valorExamen
     *
     * @return Examen
     */
    public function setValorExamen($valorExamen)
    {
        $this->valorExamen = $valorExamen;

        return $this;
    }

    /**
     * Get valorExamen
     *
     * @return integer
     */
    public function getValorExamen()
    {
        return $this->valorExamen;
    }
}

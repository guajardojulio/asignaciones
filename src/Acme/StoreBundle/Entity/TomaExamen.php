<?php

namespace Acme\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TomaExamen
 *
 * @ORM\Table(name="toma_examen")
 * @ORM\Entity
 */
class TomaExamen
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_toma", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idToma;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_agenda", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idAgenda;

    /**
     * @var string
     *
     * @ORM\Column(name="informe_del_examen", type="text", length=16777215, nullable=false)
     */
    private $informeDelExamen;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=30, nullable=false)
     */
    private $estado;



    /**
     * Set idToma
     *
     * @param integer $idToma
     *
     * @return TomaExamen
     */
    public function setIdToma($idToma)
    {
        $this->idToma = $idToma;

        return $this;
    }

    /**
     * Get idToma
     *
     * @return integer
     */
    public function getIdToma()
    {
        return $this->idToma;
    }

    /**
     * Set idAgenda
     *
     * @param integer $idAgenda
     *
     * @return TomaExamen
     */
    public function setIdAgenda($idAgenda)
    {
        $this->idAgenda = $idAgenda;

        return $this;
    }

    /**
     * Get idAgenda
     *
     * @return integer
     */
    public function getIdAgenda()
    {
        return $this->idAgenda;
    }

    /**
     * Set informeDelExamen
     *
     * @param string $informeDelExamen
     *
     * @return TomaExamen
     */
    public function setInformeDelExamen($informeDelExamen)
    {
        $this->informeDelExamen = $informeDelExamen;

        return $this;
    }

    /**
     * Get informeDelExamen
     *
     * @return string
     */
    public function getInformeDelExamen()
    {
        return $this->informeDelExamen;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return TomaExamen
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }
}

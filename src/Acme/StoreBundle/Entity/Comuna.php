<?php

namespace Acme\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Comuna
 *
 * @ORM\Table(name="comuna")
 * @ORM\Entity
 * @UniqueEntity("nombreComuna")
 */
class Comuna
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_comuna", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idComuna;

    /**
     * @var string
     * @Assert\NotBlank(message = "Debe indicar el nombre de la comuna")
     * @ORM\Column(name="nombre_comuna", type="string", length=50, nullable=false)
     */
    private $nombreComuna;



    /**
     * Get idComuna
     *
     * @return integer
     */
    public function getIdComuna()
    {
        return $this->idComuna;
    }

    /**
     * Set nombreComuna
     *
     * @param string $nombreComuna
     *
     * @return Comuna
     */
    public function setNombreComuna($nombreComuna)
    {
        $this->nombreComuna = $nombreComuna;

        return $this;
    }

    /**
     * Get nombreComuna
     *
     * @return string
     */
    public function getNombreComuna()
    {
        return $this->nombreComuna;
    }
}

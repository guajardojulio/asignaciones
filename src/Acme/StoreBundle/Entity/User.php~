<?php

namespace Acme\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="User", indexes={@ORM\Index(name="id_rol", columns={"id_rol"})})
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_usuario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_usuario", type="string", length=25, nullable=false)
     */
    private $nombreUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="clave", type="string", length=25, nullable=false)
     */
    private $clave;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_completo", type="string", length=50, nullable=false)
     */
    private $nombreCompleto;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_rol", type="integer", nullable=false)
     */
    private $idRol;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=30, nullable=false)
     */
    private $estado = 'ACTIVO';


}


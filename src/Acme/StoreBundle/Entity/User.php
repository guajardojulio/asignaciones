<?php

namespace Acme\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * User
 *
 * @ORM\Table(name="User", uniqueConstraints={@ORM\UniqueConstraint(name="nombre_usuario", columns={"nombre_usuario"})}, indexes={@ORM\Index(name="id_rol", columns={"id_rol"})})
 * @ORM\Entity
 */
class User implements AdvancedUserInterface, \Serializable
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



    /**
     * Get idUsuario
     *
     * @return integer
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set nombreUsuario
     *
     * @param string $nombreUsuario
     *
     * @return User
     */
    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;

        return $this;
    }

    /**
     * Get nombreUsuario
     *
     * @return string
     */
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * Set clave
     *
     * @param string $clave
     *
     * @return User
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get clave
     *
     * @return string
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set nombreCompleto
     *
     * @param string $nombreCompleto
     *
     * @return User
     */
    public function setNombreCompleto($nombreCompleto)
    {
        $this->nombreCompleto = $nombreCompleto;

        return $this;
    }

    /**
     * Get nombreCompleto
     *
     * @return string
     */
    public function getNombreCompleto()
    {
        return $this->nombreCompleto;
    }

    /**
     * Set idRol
     *
     * @param integer $idRol
     *
     * @return User
     */
    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;

        return $this;
    }

    /**
     * Get idRol
     *
     * @return integer
     */
    public function getIdRol()
    {
        return $this->idRol;
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
        return null;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return User
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

    public function __construct()
    {
        $this->isActive = true;
    }

    public function serialize()
    {
        // TODO: Implement serialize() method.
        return serialize(array(
            $this->idUsuario,
            $this->clave
        ));
    }

    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
        list(
            $this->idUsuario,
            $this->clave
            )= $this->unserialize($serialized);
    }

    public function isAccountNonExpired()
    {
        // TODO: Implement isAccountNonExpired() method.
        return true;
    }
    public function isAccountNonLocked()
    {
        // TODO: Implement isAccountNonLocked() method.
        return true;
    }
    public function isCredentialsNonExpired()
    {
        // TODO: Implement isCredentialsNonExpired() method.
        return true;
    }
    public function isEnabled()
    {
        // TODO: Implement isEnabled() method.
        return true;
    }


}

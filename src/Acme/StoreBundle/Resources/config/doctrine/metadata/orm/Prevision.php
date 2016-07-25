<?php



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


}


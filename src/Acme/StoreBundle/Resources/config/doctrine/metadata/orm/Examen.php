<?php



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


}


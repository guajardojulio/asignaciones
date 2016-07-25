<?php



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


}


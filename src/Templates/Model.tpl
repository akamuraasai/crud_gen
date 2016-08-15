<?php

namespace App\Models;

use App\Models\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="##nomeTabela##", options={"comment":"Tabela ##nomePagina##"})
 */

class ##nomePagina## extends Entity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column("##campoNome##",type="string", length=60, nullable=false, options={"comment":"Nome do ##nomePagina##"})
     */
    protected $##campoNome##;

    /**
     * @ORM\Column("descricao", type="string", length=3000, nullable=true, options={"comment":"Descrição do ##nomePagina##"})
     */
    protected $descricao;

    /**
     * @ORM\ManyToMany(targetEntity="Nivel", mappedBy="##nomePagina*##Habilitados")
     */
    protected $niveis;

    public function __construct() {
        $this->niveis = new ArrayCollection;
    }

    public function addNivel(Nivel $nivel)
    {
        $this->niveis->add($nivel);
        //$nivel->add##nomePagina##Habilitado($this);
        return $this;
    }

    public function removeNivel(Nivel $nivel)
    {
        $this->niveis->removeElement($nivel);
        //$nivel->remove##nomePagina##Habilitado($this);
    }
}

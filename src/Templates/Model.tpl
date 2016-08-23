<?php

namespace Rdias\Base\Models\##moduloPagina##;

use Rdias\Base\Models\Base\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="##nomeTabela##", options={"comment":"Tabela ##nomePagina##"})
 *
 * @SWG\Definition(required={"##campoNome##"}, @SWG\Xml(name="##nomePagina##"))
 */

class ##nomePagina## extends Entity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *
     * @SWG\Property(format="int64")
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column("##campoNome##",type="string", length=60, nullable=false, options={"comment":"Nome do ##nomePagina##"})
     *
     * @SWG\Property(example="texto de exemplo")
     * @var string
     */
    protected $##campoNome##;

    /**
     * @ORM\Column("descricao", type="string", length=3000, nullable=true, options={"comment":"Descrição do ##nomePagina##"})
     *
     * @SWG\Property(example="texto de exemplo")
     * @var string
     */
    protected $descricao;
}

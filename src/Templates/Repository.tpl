<?php

namespace Rdias\Base\Repositories\##moduloPagina##;

use Rdias\Base\Repositories\##moduloPagina##\I##nomePagina##Repository;
use Rdias\Base\Repositories\Base\BaseRepository;
use EntityManager;
use Doctrine\ORM\Query;
use DB;
use Defender;
use Doctrine\ORM\EntityManagerInterface;

class ##nomePagina##Repository extends BaseRepository implements I##nomePagina##Repository {

    private $em;

    public function __construct(EntityManagerInterface $em) {
        parent::__construct($em);
        $this->em = $em;
        $this->serializer = \JMS\Serializer\SerializerBuilder::create()->build();
        $this->model = 'Rdias\Base\Models\##moduloPagina##\##nomePagina##';
    }

    public function deletar(Array $id) {
        foreach ($id as $id) {
            $modelo = $this->findArray($id);
            EntityManager::remove($modelo);
        }

        EntityManager::flush();
        return true;
    }

    public function save(##nomePagina## $obj) {
        EntityManager::persist($obj);
        EntityManager::flush();
    }

    public function lista()
    {
        return $this->em->createQueryBuilder()
                ->select('i')
                ->from($this->model, 'i')
                ->getQuery()
                ->getArrayResult();
    }

    public function getDados($id){
        $query =  $this->em->createQueryBuilder()
                ->select('i')
                ->from($this->model, 'i')
                ->where('i.id')
                ->where('i.id = :objId')
                ->setParameters([':objId' => $id])
                ->getQuery()
                ->getOneOrNullResult(Query::HYDRATE_ARRAY);
        return $query;
    }

}

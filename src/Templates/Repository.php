<?php

namespace App\Repositories\##nomePagina##;

use App\Repositories\##nomePagina##\I##nomePagina##Repository;
use App\Repositories\Base\BaseRepository;
use EntityManager;
use App\Models\##nomePagina##;
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
        $this->model = 'App\Models\##nomePagina##';
    }

    public function deletar(Array $id) {
        foreach ($id as $id) {
            $modelo = $this->findArray($id);
            EntityManager::remove($modelo);
        }

        EntityManager::flush();
        return true;
    }

    public function save(array $modelo, $nivelId, $ramoId) {
      if ($modelo['id']== ""){
        $##nomePagina*## = new ##nomePagina##;
        $##nomePagina*##->addNivel($this->em->find('App\Models\Nivel', $nivelId));
        $##nomePagina*##->exchangeArray($modelo);
      }else{
        $##nomePagina*## = EntityManager::find($this->model, $modelo['id']);
        $##nomePagina*##->exchangeArray($modelo);
      }

      EntityManager::persist($##nomePagina*##);
      EntityManager::flush();

      return true;
    }

    public function lista($nivelId, $ramoId)
    {
        return $this->em->createQueryBuilder()
                ->select('i')
                ->from($this->model, 'i')
                ->leftJoin('i.niveis', 'b')
                ->where('b.id = :nivelId')
                ->setParameter(':nivelId', $nivelId)
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

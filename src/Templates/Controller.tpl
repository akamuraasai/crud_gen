<?php

namespace App\Http\Controllers\##moduloPagina##;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\##nomePagina##Request;
use Rdias\Base\Repositories\##moduloPagina##\I##nomePagina##Repository;
use Rdias\Base\Models\##moduloPagina##\##nomePagina##;

class ##nomePagina##Controller extends Controller
{
    protected $repository;
    protected $nomePdf;

    public function __construct(I##nomePagina##Repository $repository)
    {
        $this->repository = $repository;
        $this->nomePdf = '##nomePagina##.pdf';
    }

    public function getIndex()
    {
        $dados = [
            'nomePagina' => 'Cadastro de ##objPlural##',
            'nomePdf' => $this->nomePdf,
            'caminhoPdf' => "/pdf/help/".$this->nomePdf,
            'existePdf' => existePdfAjuda($this->nomePdf),
            'administrador' => \Auth::user()->getAdministrador()
        ];

        return view('##moduloPagina*##.##nomePagina*##', $dados);
    }

    public function lista()
    {
        return $this->repository->lista();
    }

    public function deletar(Request $id)
    {
        $Ids = $id->only('idObj')['idObj'];
        $Arrayid = explode(',', $Ids);
        $this->repository->deletar($Arrayid);
        return array('estado' => 'deletado');
    }

    public function post(##nomePagina##Request $request)
    {
        if ($request->id == "") {
            $obj = New ##nomePagina##;
            $obj->exchangeArray($request->all());
            $this->repository->save($obj);
            return array('estado' => 'inlcuso');
        } else {
            $obj = $this->repository->findArray($request->id);
            $obj->exchangeArray($request->all());
            $this->repository->save($obj);
            return array('estado' => 'editado');
        }
    }

    public function getDados($id)
    {
        return $this->repository->getDados($id);
    }
}

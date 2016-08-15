<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\##nomePagina##Request;
use App\Repositories\##nomePagina##\I##nomePagina##Repository;
use App\Models\##nomePagina##;
use Illuminate\Support\Facades\Session;

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

        return view('sistema.##nomePagina*##', $dados);
    }

    public function lista()
    {
        return $this->repository->lista(Session::get('ramoId'), Session::get('ramo')['ramo']['id']);
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
        $this->repository->save(Request::all(), Session::get('ramoId'), Session::get('ramo')['ramo']['id']);
        return array('estado' => 'incluso');
    }

    public function getDados($id)
    {
        return $this->repository->getDados($id);
    }
}

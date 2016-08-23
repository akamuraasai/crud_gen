@extends('layouts.form-geral', [
          'nome' => '##nomePagina*##',
          'nome_plural' => '##objPlural##',
          'nome_real' => '##objSingular##',
          'campo_nome' => '##campoNome##',
          'exporta_excel' => ##exportaXLS##,
          'item' => '##itemPermissaoPagina##',
          'tooltip' => true
])



@section('header_tabela')
<th class="text-center col-xs-7">
    <a href="" ng-click="ordenarPor('##campoNome##')"> <i class="fa fa-sort"></i> Nome</a>
</th>
<th class="text-center col-xs-11">
    Descrição
</th>
@if( Gate::check('##itemPermissaoPagina##.editar') )
    <th class="text-center col-xs-5">Ação</th>
@endif
@stop



@section('body_tabela')
<td>@{{lista.##campoNome##}}</td>
<td>@{{lista.descricao}}</td>
@if( Gate::check('##itemPermissaoPagina##.editar') )
    <td class="text-center alinha-vertical">
        <div class="btn-group">
            <button type="button"
                    class="btn btn-warning dropdown-toggle"
                    data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                <span data-toggle="tooltip" data-placement="left">
                     <i class="fa fa-bars" aria-hidden="true"></i> Opções <span class="caret"></span>
                </span>
            </button>
             <ul class="dropdown-menu">
                <li>
                    <a  href="#"
                        ng-click="editar(lista)"
                        data-id="@{{lista.id}}">
                        <i class="fa fa-pencil"></i> Editar
                    </a>
                </li>
            </ul>
        </div>
    </td>
@endif
@stop



@section('formulario')
<div class="col-xs-24 col-md-18">
    <div class="form-group">
        <label for="nome" class="control-label">Nome</label>
        <input  id="idObj" type="text" hidden ng-model="##nomePagina*##.id" name="id">
        <input type="text" id="##campoNome##" name="##campoNome##" maxlength="60" ng-model="##nomePagina*##.##campoNome##" data-error="{{Lang::get('formulario.##nomePagina*##.##campoNome##')}}" placeholder="Nome do ##nomePagina##" class="form-control" required>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="col-xs-24 col-md-24">
    <div class="form-group">
        <label for="descricao" class="control-label">Descrição</label>
        <textarea id="descricao" name="descricao" ng-model="##nomePagina*##.descricao" data-error="{{Lang::get('formulario.##nomePagina*##.descricao')}}" placeholder="Descrição do ##nomePagina##" class="form-control" required></textarea>
        <div class="help-block with-errors"></div>
    </div>
</div>
@stop


@section('js-especifico')
<script src="{{ elixir('js/all-tabela.js') }}"></script>
<script src="{{ elixir('js/all-##nomePagina*##.js') }}"></script>
@endsection

(function(){
    $("#bt-exportar").click(function(event) {
        $('#apptabela').tableExport({
            type:'excel',
            escape:'false',
            ignoreColumn: [0,4]
        });
    });

    $('[data-toggle=tooltip]').bstooltip();

    $('#md-##nomePagina*##').on('shown.bs.modal', function (e) {
        var chamada   = ($(e.relatedTarget).attr('data-botao'));
        var array_id   = new Array();
        var array_nome = new Array();
        var contador   = 0;
        var texto     = '';

        if(chamada == "deletaLista"){
            $("#mdremove").attr('data-btmodal','deletaLista');
            $("input[name=ck-item]:checked").each(
               function(){
                  array_id.push( $(this).val() );
                  array_nome.push( $(this).attr('data-nome') );
                  contador++;
              });

            if( contador == 0 ){
                array_id = new Array(null);
            }else if( contador == 1 ){
                texto='o ##objSingular*##';
            }else{
                texto='os ##objPlural*##';
            }

            $("#hd-id-##nomePagina*##").val(array_id);

        }else if(chamada == "deletaForm"){
            $("#mdremove").attr('data-btmodal','deletaForm');
            texto='o Item';
             array_nome.push( $(e.relatedTarget).attr('data-nome') )
            $("#hd-id-##nomePagina*##").val($("#idObj").val());

        }else{
            $("#mdremove").attr('data-btmodal','deletaImagem');
            texto='a Imagem do ##nomePagina##';
            array_nome.push( $(e.relatedTarget).attr('data-nome') )
            $("#hd-id-##nomePagina*##").val($("#idObj").val());
        }

        var modal = $(this)
        modal.find('.msg-modal').html('Deseja remover ' +texto+ ' <strong>' + array_nome+ '</strong>?')
    });

    $('#md-##nomePagina*##').on('hidden.bs.modal', function (e) {
        var modal = $(this)
        modal.find('.msg-modal').html('<i class="fa fa-refresh fa-spin"></i> Carregando...');
    });

    $('.alertas-sistema').removeClass('hide');
})();

/******************INICIO DO CÓDIGO ANGULAR******************/
var app = angular.module('app', ['angularUtils.directives.dirPagination','ngAnimate']);
function fn##nomePagina##Controller($scope, $http) {
    $scope.##nomePagina*## = null;
    $scope.checkar = false;
    $scope.adicionado = false;
    $scope.deletado = false;
    $scope.editado = false;
    $scope.minitem = false;
    $scope.itemm = [];
    $scope.permissoesrelacionadas = [];
    $scope.itemm.id_item = '';
    $scope.msgAcao  = 'Informações do ##objSingular##';
    $scope.msgSucesso = '';
    $scope.acoes = [
      {tipo:'Todos', id: 1},
      {tipo:'Vinculados', id: 2},
      {tipo:'Não vinculados', id: 3}
    ];
    /**********************************REMOVER APLICATIVO/IMAGEM**********************************/
    $("#mdremove").click(function(e) {

        var idObj = $("#hd-id-##nomePagina*##").val();
        $.ajax({
            url: '/cadastro/##nomePagina*##/deletar',
            type: 'DELETE',
            dataType: 'json',
            data: {
                "_token":$("input[name=_token]").val(),
                "idObj":idObj
            }
        })
        .done(function() {
            $('#md-##nomePagina*##').modal('hide');
            $scope.carregalista();
            $scope.limpa_form();
            $scope.deletado = true;
            $scope.chkTodos = false;
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.error("XHttpRequest: " + jqXHR);
            console.error("status: " + textStatus);
            console.error("error: " + errorThrown);
        });
    });
    /********************************FIM REMOVER APLICATIVO********************************/


    /*****************************ADICIONA/EDITA APLICATIVO - ADICIONA ITEM****************************/
    jQuery('form').validator().on('submit', function(e){
        var rota="";
        var tipoForm = $(this).attr('id');
        if (tipoForm  == "##nomePagina*##"){
            rota="/cadastro/##nomePagina*##";
        }

        if (e.isDefaultPrevented()) {
            return;
        }

        var dados = jQuery( this ).serialize();
        jQuery.ajax({
            type: "POST",
            url: rota,
            data: dados,
            success: function( data )
            {
                if( tipoForm == "##nomePagina*##"){
                    $scope.carregalista();
                    if($scope.##nomePagina*##.id>0){
                        $scope.editado = true;
                    }else{
                        $scope.msgSucesso = "##nomePagina## adicionado com sucesso!";
                        $scope.adicionado = true;
                    }
                    $scope.limpa_form();
                    jQuery('form').validator('validate');
                    $("html, body").animate({ scrollTop: 0 }, 600);
                }
            },
            error: function(dados)
            {
                angular.element("#avisaFormularioErro").show();
            }
        });
        return false;
    });
    /******************************FIM ADICIONA/EDITA APLICATIVO/ITEM******************************/

    /********************************LIMPA MENSAGEM BOOTSTRAP********************************/
    $scope.msgAcaoAdd = function(){
        $scope.adicionado=false;
    };
    $scope.msgAcaoDel = function(){
        $scope.deletado=false;
    };
    $scope.msgAcaoEdit = function(){
        $scope.editado=false;
    };
    $scope.msgAcaoMin = function(){
        $scope.minitem=false;
    };
    /******************************FIM LIMPA MENSAGEM BOOTSTRAP******************************/

    /********************************LIMPA FORMULARIO********************************/
    $scope.limpa_form = function (){
        $scope.##nomePagina*##=null;

        $scope.msgAcao='Novo ##objSingular*##';
        $("###campoNome##").focus();
    };
    /******************************FIM LIMPA FORMULARIO******************************/

    $scope.pesquisar = function(pesquisa){
        $scope.completing = true;
    };

    /********************************POPULA TABELA DINAMICAMENTE********************************/
    $scope.carregalista = function(){
        $http.get('/cadastro/##nomePagina*##/lista').success(function(data){
            $scope.listas = data;
        }).error(function(erro){
            console.error(erro);
        });
    };
    /******************************FIM POPULA TABELA DINAMICAMENTE******************************/

    /********************************POPULA FORM PARA EDIÇÃO********************************/
    $scope.editar = function(campo){

        $scope.msgAcao='Editar ##objSingular##';


        $http.get('/cadastro/##nomePagina*##/data/'+campo).success(function(data){
            $scope.##nomePagina*##=data;

            $("#infos").collapse('show');
            $('###campoNome##').focus();
        }).error(function(erro){
            console.error(erro);
        });
    };
    /******************************FIM POPULA FORM PARA EDIÇÃO******************************/


    /********************************ORDENAÇÃO DA TABELA********************************/
    $scope.ordenarPor = function(campo){
        $scope.criterioDeOrdenacao = campo;
        $scope.direcaoDaOrdenacao = !$scope.direcaoDaOrdenacao;
    };

    $scope.itemOrdenarPor = function(campo){
        $scope.itemCriterioDeOrdenacaoI = campo;
        $scope.itemDirecaoDaOrdenacaoI = !$scope.itemDirecaoDaOrdenacaoI;
    };
    /********************************ORDENAÇÃO DA TABELA********************************/


    /********************************SELECIONA TODOS OS CHECKBOX********************************/
    $scope.habilitaChkTodos = function(){
        var count = 0;
        angular.forEach($scope.listas, function (lista) {
                count++;
            });
        return count;
    };
    /********************************FIM SELECIONA CHECKBOX********************************/


    /********************************AÇÃO DE FILTRO DE ITEM********************************/
    $scope.acaoItem = function(acao){
        switch(acao){
            case 1:
            $scope.filtroItem=''
            break;
            case 2:
            $scope.filtroItem='true'
            break;
            default:
            $scope.filtroItem='false'
        }
    };
    /********************************FIM AÇÃO DE FILTRO DE ITEM********************************/


    /********************************ESCONDE BOTÃO EXCLUIR, SE NÃO HOUVER CHECK SELECIONADO********************************/
    $scope.countChecked = function(){
        var count = 0;
        angular.forEach($scope.listas, function(value){
            if (value.Selected) count++;
        });

        return count;
    };
    /********************************FIM ESCONDE BOTÃO EXCLUIR********************************/

}
fn##nomePagina##Controller.$inject = ['$scope', '$http'];
app.controller('baseController', fn##nomePagina##Controller);
/******************FIM ANGULAR******************/

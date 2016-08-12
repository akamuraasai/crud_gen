<?php
namespace AkamuraAsai\CrudGen\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Storage;
use File;

class CrudGenController extends Controller
{
    public function index($timezone)
    {
        $time = Carbon::now($timezone)->toDateTimeString();
        return view('crudgen::index', compact('time'));
    }

    public function test()
    {
        // cria um arquivo dentro da pasta /storage/crud chamado teste.txt
        // se a pasta /crud não existir, cria a pasta também
        // o segundo parametro é o conteudo que vai ser gravado no arquivo
        // se o arquivo já existir, o comando vai sobreescreve-lo.
        Storage::put('crud/teste.txt', "<?php echo 'uns textos ai';");

        // pega o conteudo do arquivo teste.txt em /storage/crud/
        // coloca o conteudo dentro de uma variavel
        // depois imprime na tela.
//         $contents = Storage::get('crud/teste.txt');

        // Pe
        $contents = File::get(dirname(__DIR__).'\Templates\Controller.txt');
        $contents = str_replace("##nomePagina##", "Testes", $contents);
        Storage::put('crud/controller.php', $contents);

//        echo $contents;
        echo "foi";
    }
}
<?php
namespace AkamuraAsai\CrudGen\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Storage;
use File;

class CrudGenController extends Controller
{
    private $pageName = 'Teste';
    private $pageModule = 'Inprocess';
    private $objSingular = 'Teste';
    private $objPlural = 'Testes';
    private $nameField = 'nome';
    private $xlsExport = 'true';
    private $tableName = 'inp_teste';
    private $breadParent = 'inprocess';

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
        $contents = File::get(dirname(__DIR__).'/Templates/app.tpl');
        Storage::put("crud/".$this->pageName."app.php", $this->replaceWildcards($contents));

        $contents = File::get(dirname(__DIR__).'/Templates/breadcrumbs.tpl');
        Storage::put("crud/".$this->pageName."breadcrumbs.php", $this->replaceWildcards($contents));

        $contents = File::get(dirname(__DIR__).'/Templates/Controller.tpl');
        Storage::put("crud/".$this->pageName."Controller.php", $this->replaceWildcards($contents));

        $contents = File::get(dirname(__DIR__).'/Templates/gulpfile.tpl');
        Storage::put("crud/".$this->pageName."gulpfile.js", $this->replaceWildcards($contents));

        $contents = File::get(dirname(__DIR__).'/Templates/InterfaceRepository.tpl');
        Storage::put("crud/I".$this->pageName."Repository.php", $this->replaceWildcards($contents));

        $contents = File::get(dirname(__DIR__).'/Templates/Model.tpl');
        Storage::put("crud/".$this->pageName.".php", $this->replaceWildcards($contents));

        $contents = File::get(dirname(__DIR__).'/Templates/Repository.tpl');
        Storage::put("crud/".$this->pageName."Repository.php", $this->replaceWildcards($contents));

        $contents = File::get(dirname(__DIR__).'/Templates/Request.tpl');
        Storage::put("crud/".$this->pageName."Request.php", $this->replaceWildcards($contents));

        $contents = File::get(dirname(__DIR__).'/Templates/routes.tpl');
        Storage::put("crud/".$this->pageName."routes.php", $this->replaceWildcards($contents));

        $contents = File::get(dirname(__DIR__).'/Templates/scripts.tpl');
        Storage::put("crud/".$this->pageName.".js", $this->replaceWildcards($contents));

        $contents = File::get(dirname(__DIR__).'/Templates/ServiceProvider.tpl');
        Storage::put("crud/".$this->pageName."ServiceProvider.php", $this->replaceWildcards($contents));

        $contents = File::get(dirname(__DIR__).'/Templates/view.tpl');
        Storage::put("crud/".$this->pageName.".blade.php", $this->replaceWildcards($contents));

//        echo $contents;
        echo "foi";
    }

    private function replaceWildcards($file_content)
    {
        $aux = $file_content;
        $aux = str_replace("##nomePagina*##", strtolower($this->pageName), str_replace("##nomePagina##", $this->pageName, $aux));
        $aux = str_replace("##moduloPagina*##", strtolower($this->pageModule), str_replace("##moduloPagina##", $this->pageModule, $aux));
        $aux = str_replace("##objSingular*##", strtolower($this->objSingular), str_replace("##objSingular##", $this->objSingular, $aux));
        $aux = str_replace("##objPlural*##", strtolower($this->objPlural), str_replace("##objPlural##", $this->objPlural, $aux));
        $aux = str_replace("##campoNome", $this->nameField, $aux);
        $aux = str_replace("##exportaXLS##", $this->xlsExport, $aux);
        $aux = str_replace("##nomeTabela##", $this->tableName, $aux);
        $aux = str_replace("##paiBread##", $this->breadParent, $aux);

        return $aux;
    }
}
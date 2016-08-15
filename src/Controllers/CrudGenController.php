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
    private $error_log;

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
//        Storage::put('crud/teste.txt', "<?php echo 'uns textos ai';");

        // pega o conteudo do arquivo teste.txt em /storage/crud/
        // coloca o conteudo dentro de uma variavel
        // depois imprime na tela.
//         $contents = Storage::get('crud/teste.txt');

//        echo $contents;

        if ($this->generateCRUD()) echo "foi";
        else echo "não foi";
        echo $this->error_log;
    }

    private function generateCRUD()
    {
        return $this->makeController() &&
        $this->makeInterface() &&
        $this->makeJavaScript() &&
        $this->makeModel() &&
        $this->makeRepository() &&
        $this->makeRequest() &&
        $this->makeRoutes() &&
        $this->makeView() &&
        $this->changeServiceProvider() &&
        $this->changeBreadcrumbs() &&
        $this->changeGulpfile();
    }

    private function addToLine($file_src, $search_word, $new_text)
    {
        $file = file($file_src);
        for($i = 0; $i < count($file); $i++)
        {
            if(strstr($file[$i], $search_word))
            {
                $file[$i] = $file[$i] . $new_text;
                break;
            }
        }
        return implode("", $file);
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

    private function loadAndCreate($file_load, $file_save)
    {
        try {
            $contents = File::get(dirname(__DIR__)."/Templates/$file_load");
            Storage::put("crud/$file_save", $this->replaceWildcards($contents));
        } catch (\Exception $e) {
            $this->error_log .= $e->getMessage() . "\n";
            return false;
        }
        return true;
    }

    private function loadAndChange($file_load, $file_save, $wildcard)
    {
        $output = dirname(dirname(dirname(dirname(__DIR__)))) . "/$file_save";
        try {
            $contents = File::get(dirname(__DIR__)."/Templates/$file_load");
            $fileToChange = $this->addToLine(
                $output,
                $wildcard,
                "\n" . $this->replaceWildcards($contents)
            );
            Storage::put("crud/$file_save", $fileToChange);
        } catch (\Exception $e) {
            $this->error_log .= $e->getMessage() . "\n";
            return false;
        }
        return true;
    }

    private function makeModel()
    {
        return $this->loadAndCreate(
            "Model.tpl",
            "packages/rdias/base/src/Models/$this->pageModule/$this->pageName.php"
        );
    }

    private function makeController()
    {
        return $this->loadAndCreate(
            "Controller.tpl",
            "app/Http/Controllers/Sistema/" . $this->pageName . "Controller.php"
        );
    }

    private function makeRequest()
    {
        return $this->loadAndCreate(
            "Request.tpl",
            "app/Http/Requests/" . $this->pageName . "Request.php"
        );
    }

    private function makeRepository()
    {
        return $this->loadAndCreate(
            "Repository.tpl",
            "packages/rdias/base/src/Repositories/$this->pageModule/" . $this->pageName . "Repository.php"
        );
    }

    private function makeInterface()
    {
        return $this->loadAndCreate(
            "InterfaceRepository.tpl",
            "packages/rdias/base/src/Repositories/$this->pageModule/I" . $this->pageName . "Repository.php"
        );
    }

    private function makeView()
    {
        return $this->loadAndCreate(
            "view.tpl",
            "resources/views/sistema/" . strtolower($this->pageName) . ".blade.php"
        );
    }

    private function makeJavaScript()
    {
        return $this->loadAndCreate(
            "scripts.tpl",
            "resources/assets/js/" . strtolower($this->pageName) . ".js"
        );
    }

    private function makeRoutes()
    {
        return $this->loadAndCreate(
            "routes.tpl",
            "app/Http/Routes/" .strtolower($this->breadParent) . "/" . strtolower($this->pageName) . ".php"
        );
    }

    private function changeServiceProvider()
    {
        return $this->loadAndChange(
            "ServiceProvider.tpl",
            "packages/rdias/base/src/RepositoriosServiceProvider.php",
            "//fim do arquivo"
        );
    }

    private function changeBreadcrumbs()
    {
        return $this->loadAndChange(
            "breadcrumbs.tpl",
            "app/Http/breadcrumbs.php",
            "//fim do arquivo"
        );
    }

    private function changeGulpfile()
    {
        return $this->loadAndChange(
            "gulpfile.tpl",
            "gulpfile.js",
            "//fim do arquivo"
        );
    }

}
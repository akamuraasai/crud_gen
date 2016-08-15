<?php

namespace Rdias\Base;

use Illuminate\Support\ServiceProvider;

class RepositoriosServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Rdias\Base\Repositories\Base\IBaseRepository',
            'Rdias\Base\Repositories\Base\BaseRepository'
        );

        $this->app->bind(
            'Rdias\Base\Repositories\Dashboard\IDashboardRepository',
            'Rdias\Base\Repositories\Dashboard\DashboardRepository'
        );
        $this->app->bind(
            'Rdias\Base\Repositories\Dashboard\IDashboardPainelRepository',
            'Rdias\Base\Repositories\Dashboard\DashboardPainelRepository'
        );
        $this->app->bind(
            'Rdias\Base\Repositories\Dashboard\IGraficoRepository',
            'Rdias\Base\Repositories\Dashboard\GraficoRepository'
        );

        $this->app->bind(
            'Rdias\Base\Repositories\Gerencial\IAplicativoRepository',
            'Rdias\Base\Repositories\Gerencial\AplicativoRepository'
        );
        $this->app->bind(
            'Rdias\Base\Repositories\Gerencial\IAtivaUsuarioRepository',
            'Rdias\Base\Repositories\Gerencial\AtivaUsuarioRepository'
        );
        $this->app->bind(
            'Rdias\Base\Repositories\Gerencial\IClienteRepository',
            'Rdias\Base\Repositories\Gerencial\ClienteRepository'
        );
        $this->app->bind(
            'Rdias\Base\Repositories\Gerencial\IEntidadeRepository',
            'Rdias\Base\Repositories\Gerencial\EntidadeRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Gerencial\IEscolhaSuiteRepository',
            'Rdias\Base\Repositories\Gerencial\EscolhaSuiteRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Gerencial\IFaqRepository',
            'Rdias\Base\Repositories\Gerencial\FaqRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Gerencial\IItemAppRepository',
            'Rdias\Base\Repositories\Gerencial\ItemAppRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Gerencial\IMenuItemRepository',
            'Rdias\Base\Repositories\Gerencial\MenuItemRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Gerencial\INivelRepository',
            'Rdias\Base\Repositories\Gerencial\NivelRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Gerencial\IPerfilMacroRepository',
            'Rdias\Base\Repositories\Gerencial\PerfilMacroRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Gerencial\IPerfilMicroGrupoRepository',
            'Rdias\Base\Repositories\Gerencial\PerfilMicroGrupoRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Gerencial\IPerfilMicroUsuarioRepository',
            'Rdias\Base\Repositories\Gerencial\PerfilMicroUsuarioRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Gerencial\IRamoRepository',
            'Rdias\Base\Repositories\Gerencial\RamoRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Gerencial\ISuiteRepository',
            'Rdias\Base\Repositories\Gerencial\SuiteRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Gerencial\IUsuarioRepository',
            'Rdias\Base\Repositories\Gerencial\UsuarioRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Gerencial\IAssuntoContatoRepository',
            'Rdias\Base\Repositories\Gerencial\AssuntoContatoRepository'
        );
        $this->app->bind(
          'Rdias\Base\Repositories\Gerencial\ITagsRepository',
          'Rdias\Base\Repositories\Gerencial\TagsRepository'
        );

        $this->app->bind(
            'Rdias\Base\Repositories\Inprocess\ICriterioRepository',
            'Rdias\Base\Repositories\Inprocess\CriterioRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Inprocess\IDigitacaoColetaRepository',
            'Rdias\Base\Repositories\Inprocess\DigitacaoColetaRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Inprocess\IGrupoIndicadorRepository',
            'Rdias\Base\Repositories\Inprocess\GrupoIndicadorRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Inprocess\IIndicadorRepository',
            'Rdias\Base\Repositories\Inprocess\IndicadorRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Inprocess\IInprocessRepository',
            'Rdias\Base\Repositories\Inprocess\InprocessRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Inprocess\IProcessoMelhorPraticaRepository',
            'Rdias\Base\Repositories\Inprocess\ProcessoMelhorPraticaRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Inprocess\IProcessoRepository',
            'Rdias\Base\Repositories\Inprocess\ProcessoRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Inprocess\IRelatorioGruposIndicadorRepository',
            'Rdias\Base\Repositories\Inprocess\RelatorioGruposIndicadorRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Inprocess\IRoteiroRepository',
            'Rdias\Base\Repositories\Inprocess\RoteiroRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Inprocess\IRotinaRepository',
            'Rdias\Base\Repositories\Inprocess\RotinaRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Inprocess\IRotinasSetoresRepository',
            'Rdias\Base\Repositories\Inprocess\RotinasSetoresRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Inprocess\ISetorMelhorPraticaRepository',
            'Rdias\Base\Repositories\Inprocess\SetorMelhorPraticaRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Inprocess\ISetorRepository',
            'Rdias\Base\Repositories\Inprocess\SetorRepository'
        );

        $this->app->bind(
            'Rdias\Base\Repositories\Ocorrencias\IGrupoNotificacoesRepository',
            'Rdias\Base\Repositories\Ocorrencias\GrupoNotificacoesRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Ocorrencias\IJobsOcorrenciaRepository',
            'Rdias\Base\Repositories\Ocorrencias\JobsOcorrenciaRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Ocorrencias\ILogNotificacoesRepository',
            'Rdias\Base\Repositories\Ocorrencias\LogNotificacoesRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Ocorrencias\IManutencaoRepository',
            'Rdias\Base\Repositories\Ocorrencias\ManutencaoRepository'
          );
          $this->app->bind(
            'Rdias\Base\Repositories\Ocorrencias\IOcorrenciaAutomaticaRepository',
            'Rdias\Base\Repositories\Ocorrencias\OcorrenciaAutomaticaRepository'
        );

        $this->app->bind(
            'Rdias\Base\Repositories\Relatorios\IRelatoriosRepository',
            'Rdias\Base\Repositories\Relatorios\RelatoriosRepository'
        );

        $this->app->bind(
            'Rdias\Base\Repositories\Gerencial\IUsuarioLojaRepository',
            'Rdias\Base\Repositories\Gerencial\UsuarioLojaRepository'
        );

        $this->app->bind(
            'Rdias\Base\Repositories\Inprocess\IGrupoPermissaoRepository',
            'Rdias\Base\Repositories\Inprocess\GrupoPermissaoRepository'
        );

        $this->app->bind(
            'Rdias\Base\Repositories\Relatorios\IPivotRepository',
            'Rdias\Base\Repositories\Relatorios\PivotRepository'
        );

        $this->app->bind(
            'Rdias\Base\Repositories\Gerencial\IVisaoRepository',
            'Rdias\Base\Repositories\Gerencial\VisaoRepository'
        );

        $this->app->bind(
            'Rdias\Base\Repositories\Gerencial\IEstadoRepository',
            'Rdias\Base\Repositories\Gerencial\EstadoRepository'
        );

        $this->app->bind(
            'Rdias\Base\Repositories\Gerencial\ICidadeRepository',
            'Rdias\Base\Repositories\Gerencial\CidadeRepository'
        );

        $this->app->bind(
            'Rdias\Base\Repositories\Gerencial\IImportacaoRepository',
            'Rdias\Base\Repositories\Gerencial\ImportacaoRepository'
        );

        //fim do arquivo

        $this->app->bind(
            'Rdias\Base\Repositories\Inprocess\ITesteRepository',
            'Rdias\Base\Repositories\Inprocess\TesteRepository'
        );
        $this->app->bind(
            'Rdias\Base\Repositories\Inprocess\ITesteRepository',
            'Rdias\Base\Repositories\Inprocess\TesteRepository'
        );
    }
}

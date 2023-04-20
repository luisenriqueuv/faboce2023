<?php

namespace Modules\RecursosHumanos\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Modules\RecursosHumanos\Services\AgenciaService;
use Modules\RecursosHumanos\Services\AreaService;
use Modules\RecursosHumanos\Services\TiporegistroService;
use Modules\RecursosHumanos\Services\CargoService;
use Modules\RecursosHumanos\Services\PersonalService;
use Modules\RecursosHumanos\Services\DocumentoService;
use Modules\RecursosHumanos\Services\JerarquiaService;
use Modules\RecursosHumanos\Services\FormularioService;
use Modules\RecursosHumanos\Services\Formulario1Service;
use Modules\RecursosHumanos\Services\PruebaService;
use Modules\RecursosHumanos\Services\CompensacionService;
use Modules\RecursosHumanos\Services\ReemplazoService;
use Modules\RecursosHumanos\Services\CambioturnoService;
use Modules\RecursosHumanos\Services\DescansoService;
use Modules\RecursosHumanos\Services\VacacioncalculoService;
use Modules\RecursosHumanos\Services\SalidaPersonal\VacacionService;
use Modules\RecursosHumanos\Services\SalidaPersonal\Vacacion1Service;
use Modules\RecursosHumanos\Services\SalidaPersonal\VacacionKardexService;
use Modules\RecursosHumanos\Services\SeccionService;

class RecursosHumanosServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'RecursosHumanos';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'recursoshumanos';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->bind('area', AreaService::class);
        $this->app->bind('cargo', CargoService::class);
        $this->app->bind('formulario', FormularioService::class);
        $this->app->bind('jerarquia', JerarquiaService::class);
        $this->app->bind('personal', PersonalService::class);
        $this->app->bind('formulario1', Formulario1Service::class);
        $this->app->bind('rrhh_documento', DocumentoService::class);
        $this->app->bind('rrhh_vacacion', VacacionService::class);
        $this->app->bind('rrhh_vacacion1', Vacacion1Service::class);
        $this->app->bind('rrhh_vacacionkardex', VacacionKardexService::class);
        $this->app->bind('rrhh_agencia', AgenciaService::class);
        $this->app->bind('rrhh_tiporegistro', TiporegistroService::class);
        /**  AGREGAR   */
        $this->app->bind('rrhh_prueba', PruebaService::class);
        $this->app->bind('rrhh_compensacion', CompensacionService::class);
        $this->app->bind('rrhh_reemplazo', ReemplazoService::class);
        $this->app->bind('rrhh_cambio_turno', CambioturnoService::class);
        $this->app->bind('rrhh_descanso', DescansoService::class);
        $this->app->bind('rrhh_seccion', SeccionService::class);
        $this->app->bind('rrhh_vacaciones_personal', VacacioncalculoService::class);
    }

    /**
     * Register  config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'),
            $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }
}

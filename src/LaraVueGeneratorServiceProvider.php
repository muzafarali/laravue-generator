<?php

namespace LaraVue\Generator;

use Illuminate\Support\ServiceProvider;
use LaraVue\Generator\Commands\API\APIControllerGeneratorCommand;
use LaraVue\Generator\Commands\API\APIGeneratorCommand;
use LaraVue\Generator\Commands\API\APIRequestsGeneratorCommand;
use LaraVue\Generator\Commands\API\TestsGeneratorCommand;
use LaraVue\Generator\Commands\APIScaffoldGeneratorCommand;
use LaraVue\Generator\Commands\Common\MigrationGeneratorCommand;
use LaraVue\Generator\Commands\Common\ModelGeneratorCommand;
use LaraVue\Generator\Commands\Common\RepositoryGeneratorCommand;
use LaraVue\Generator\Commands\Publish\GeneratorPublishCommand;
use LaraVue\Generator\Commands\Publish\LayoutPublishCommand;
use LaraVue\Generator\Commands\Publish\PublishTemplateCommand;
use LaraVue\Generator\Commands\Publish\VueJsLayoutPublishCommand;
use LaraVue\Generator\Commands\RollbackGeneratorCommand;
use LaraVue\Generator\Commands\Scaffold\ControllerGeneratorCommand;
use LaraVue\Generator\Commands\Scaffold\RequestsGeneratorCommand;
use LaraVue\Generator\Commands\Scaffold\ScaffoldGeneratorCommand;
use LaraVue\Generator\Commands\Scaffold\ViewsGeneratorCommand;
use LaraVue\Generator\Commands\VueJs\VueJsGeneratorCommand;

class LaraVueGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/laravue_generator.php';

        $this->publishes([
            $configPath => config_path('laravue/laravue_generator.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('laravue.publish', function ($app) {
            return new GeneratorPublishCommand();
        });

        $this->app->singleton('laravue.api', function ($app) {
            return new APIGeneratorCommand();
        });

        $this->app->singleton('laravue.scaffold', function ($app) {
            return new ScaffoldGeneratorCommand();
        });

        $this->app->singleton('laravue.publish.layout', function ($app) {
            return new LayoutPublishCommand();
        });

        $this->app->singleton('laravue.publish.templates', function ($app) {
            return new PublishTemplateCommand();
        });

        $this->app->singleton('laravue.api_scaffold', function ($app) {
            return new APIScaffoldGeneratorCommand();
        });

        $this->app->singleton('laravue.migration', function ($app) {
            return new MigrationGeneratorCommand();
        });

        $this->app->singleton('laravue.model', function ($app) {
            return new ModelGeneratorCommand();
        });

        $this->app->singleton('laravue.repository', function ($app) {
            return new RepositoryGeneratorCommand();
        });

        $this->app->singleton('laravue.api.controller', function ($app) {
            return new APIControllerGeneratorCommand();
        });

        $this->app->singleton('laravue.api.requests', function ($app) {
            return new APIRequestsGeneratorCommand();
        });

        $this->app->singleton('laravue.api.tests', function ($app) {
            return new TestsGeneratorCommand();
        });

        $this->app->singleton('laravue.scaffold.controller', function ($app) {
            return new ControllerGeneratorCommand();
        });

        $this->app->singleton('laravue.scaffold.requests', function ($app) {
            return new RequestsGeneratorCommand();
        });

        $this->app->singleton('laravue.scaffold.views', function ($app) {
            return new ViewsGeneratorCommand();
        });

        $this->app->singleton('laravue.rollback', function ($app) {
            return new RollbackGeneratorCommand();
        });

        $this->app->singleton('laravue.vuejs', function ($app) {
            return new VueJsGeneratorCommand();
        });
        $this->app->singleton('laravue.publish.vuejs', function ($app) {
            return new VueJsLayoutPublishCommand();
        });

        $this->commands([
            'laravue.publish',
            'laravue.api',
            'laravue.scaffold',
            'laravue.api_scaffold',
            'laravue.publish.layout',
            'laravue.publish.templates',
            'laravue.migration',
            'laravue.model',
            'laravue.repository',
            'laravue.api.controller',
            'laravue.api.requests',
            'laravue.api.tests',
            'laravue.scaffold.controller',
            'laravue.scaffold.requests',
            'laravue.scaffold.views',
            'laravue.rollback',
            'laravue.vuejs',
            'laravue.publish.vuejs',
        ]);
    }
}

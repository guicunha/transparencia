<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\DocumentoRepository::class, \App\Repositories\DocumentoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RecursosHumanosRepository::class, \App\Repositories\RecursosHumanosRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\DespesaRepository::class, \App\Repositories\DespesaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ConfiguracaoRepository::class, \App\Repositories\ConfiguracaoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MenuRepository::class, \App\Repositories\MenuRepositoryEloquent::class);
        //:end-bindings:
    }
}

<?php

namespace Mbhanife\LaravelUsersAcl\Providers;

use Illuminate\Support\ServiceProvider;

class AclServiceProvider extends ServiceProvider
{

    public function boot(){

        //$this->publishes([__DIR__.'/../config.php' => config_path('mbhAcl.php')]);
        //$this->loadRoutesFrom(__DIR__.'/../routes.php');
        //$this->loadViewsFrom(__DIR__.'/../resources/views', 'courier');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

    }
}

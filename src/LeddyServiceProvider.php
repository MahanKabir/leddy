<?php


namespace Mahan\Leddy;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class LeddyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Leddy', function (){
            return new Leddy;
        });

        $this->mergeConfigFrom(__DIR__ . '/Config/main.php', 'leddy');
    }

    public function boot()
    {
        require __DIR__ . '/Http/routes.php';

        $this->loadViewsFrom(__DIR__ . '/Views', 'leddy');
        $this->publishes([
            __DIR__ . '/Config/main.php' => config_path('leddy.php'),
            __DIR__ . '/Views' => base_path('/resources/views/leddy'),
            __DIR__ . '/Migrations' => database_path('/migrations'),
        ]);
    }
}

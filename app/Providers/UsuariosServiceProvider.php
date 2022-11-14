<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UsuariosServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Interfaces\UsuariosInterface',
            'App\Services\UsuariosService'
        );
    }

}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use App\Models\ValidarIdentificacion;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
        $this->validations();
    }
    private function validations()
    {
        Validator::extend('cedula', function ($attribute, $value, $parametes) {
            $validatorEc = new ValidarIdentificacion;
            return $validatorEc->validarCedula($value);
        });
    }
}

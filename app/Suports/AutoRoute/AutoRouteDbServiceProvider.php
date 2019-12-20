<?php

/**
 * ==============================================================================================================
 *
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 * ==============================================================================================================
 */
namespace App\Suports\AutoRoute;

use Illuminate\Support\ServiceProvider;
use App\Suports\AutoRoute\Contracts\iAutoRouteModel;
use App\Suports\AutoRoute\Model\AutoRouteModel;
use App\Suports\AutoRoute\Contracts\iAutoRouteService;
use App\Suports\AutoRoute\Services\AutoRouteDbService;

class AutoRouteDbServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(iAutoRouteModel::class, AutoRouteModel::class);
        $this->app->bind(iAutoRouteService::class, AutoRouteDbService::class);
        $this->app->bind('autoRouteDB',
            function($app) {
                return new AutoRouteDbService(app(AutoRouteModel::class));
            });
    }
}

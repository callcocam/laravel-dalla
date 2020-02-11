<?php

namespace App\Providers;

use App\Suports\AutoRouteServiceProvider;
use App\Suports\Intl\IntlServiceProvider;
use App\Suports\Shinobi\ShinobiServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton(\Faker\Generator::class, function () {
            return \Faker\Factory::create('pt_BR');
        });

        //$this->app->bind('path.public', function () {

        //    return base_path("sistema") ;

       // });
        $this->app->register(IntlServiceProvider::class);
        $this->app->register(AutoRouteServiceProvider::class);
        $this->app->register(ShinobiServiceProvider::class);
        $this->app->register(\App\Suports\Notify\NotifyServiceProvider::class);

        include app_path("Suports/helpers.php");
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength('191');
        $platform = Schema::getConnection()->getDoctrineSchemaManager()->getDatabasePlatform();
        $platform->registerDoctrineTypeMapping('enum', 'string');

        $this->bluePrintMacros();
    }


    public function bluePrintMacros()
    {
        Blueprint::macro('id', function($name="id"){
            $this->uuid($name)->primary();
        });

        Blueprint::macro('tenant', function($name="company_id"){
            $this->uuid($name)->nullable();
            $this
                ->foreign($name)
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Blueprint::macro('user', function($name="user_id"){
            $this->uuid($name)->nullable();
            $this
                ->foreign($name)
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Blueprint::macro('status', function($status =[]){
            $this->enum('status', array_merge([  'deleted','draft','published'], $status))->default('published');
        });

    }
}

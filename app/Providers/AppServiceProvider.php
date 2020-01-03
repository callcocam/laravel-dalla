<?php

namespace App\Providers;

use App\Suports\Activitylog\ActivitylogServiceProvider;
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
        $this->app->register(ShinobiServiceProvider::class);
        $this->app->register(\App\Suports\Notify\NotifyServiceProvider::class);
        $this->app->register(ActivitylogServiceProvider::class);

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
        Blueprint::macro('tenant', function(){
            $this->unsignedBigInteger('company_id')->nullable();
            $this
                ->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Blueprint::macro('user', function(){
            $this->unsignedBigInteger('user_id')->nullable();
            $this
                ->foreign('user_id')
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

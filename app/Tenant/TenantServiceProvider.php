<?php

namespace App\Tenant;

use App\Model\Admin\Company;
use App\Tenant\Facades\Tenant;
use Illuminate\Support\ServiceProvider;

class TenantServiceProvider extends ServiceProvider
{

    private $company;
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        if (function_exists('config_path')) {
            $this->publishes([
                realpath(__DIR__.'/../config/landlord.php') => config_path('landlord.php'),
            ]);
        }

        try {
            $this->company = Company::query()->where('assets', request()->getHost())->first();

            $tenant = 1;

            if ($this->company) :

                $tenant = $this->company->id;
                //die(response("Nenhuma empresa cadastrada com esse endereço " . str_replace("admin.", "", request()->getHost()), 401));

            endif;

            Tenant::addTenant("company_id", $tenant);

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TenantManager::class, function () {
            return new TenantManager();
        });
    }
}

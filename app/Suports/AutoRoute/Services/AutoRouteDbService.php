<?php

/**
 * ==============================================================================================================
 *
 * AutoRouteDbService: Classe para registro de rotas
 *
 * ----------------------------------------------------
 *
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 * ==============================================================================================================
 */
namespace App\Suports\AutoRoute\Services;

use App\Suports\AutoRoute\Contracts\iAutoRouteModel;
use Illuminate\Support\Facades\Route;

class AutoRouteDbService
{
    protected $model;
    function __construct(iAutoRouteModel $model)
    {
        $this->model = $model;
    }
    public function register()
    {
        $return = false;

        if ($this->model->tableExists()) {

            $myRoute = $this->model->get();

            $myRoute->each(function (iAutoRouteModel $myRoute) use (&$return) {

                if($myRoute->resource){

                    $this->resources($myRoute);
                }
                else{

                    switch ($myRoute->verb):
                        case 'post':
                            $this->post($myRoute);
                            break;
                        case 'put':
                            $this->put($myRoute);
                            break;
                        case 'delete':
                            $this->delete($myRoute);
                            break;
                        case 'any':
                            $this->any($myRoute);
                            break;
                        default:
                            $this->get($myRoute);
                            break;
                    endswitch;

                }

            });
        }
        return $return;
    }

    private function resources($resource){

        if ($this->middleware($resource)) {

            Route::resource($this->pattern($resource), $resource->controller)->names([
                'index'=>sprintf('admin.%s.index', $resource->route),
                'create'=>sprintf('admin.%s.create', $resource->route),
                'store'=>sprintf('admin.%s.store', $resource->route),
                'show'=>sprintf('admin.%s.show', $resource->route),
                'edit'=>sprintf('admin.%s.edit', $resource->route),
                'update'=>sprintf('admin.%s.update', $resource->route),
                'destroy'=>sprintf('admin.%s.destroy', $resource->route),
            ])->middleware($resource->middleware);



        } else {

            Route::resource($this->pattern($resource), $resource->controller)->names([
                'index'=>sprintf('admin.%s.index', $resource->route),
                'create'=>sprintf('admin.%s.create', $resource->route),
                'store'=>sprintf('admin.%s.store', $resource->route),
                'show'=>sprintf('admin.%s.show', $resource->route),
                'edit'=>sprintf('admin.%s.edit', $resource->route),
                'update'=>sprintf('admin.%s.update', $resource->route),
                'destroy'=>sprintf('admin.%s.destroy', $resource->route),
            ]);

        }

        $this->print($resource);
        $this->find($resource);


    }

    private function post($Route){
        if ($this->middleware($Route)) {
            Route::post($this->pattern($Route), sprintf("%s@%s", $Route->controller, $Route->method))
                ->name($Route->route)->middleware($Route->middleware);
        } else {
            Route::post($this->pattern($Route), sprintf("%s@%s", $Route->controller, $Route->method))
                ->name($Route->route);
        }

    }
    private function put($Route){
        if ($this->middleware($Route)) {
            Route::put($this->pattern($Route), sprintf("%s@%s", $Route->controller, $Route->method))
                ->name($Route->route)->middleware($Route->middleware);
        } else {
            Route::put($this->pattern($Route), sprintf("%s@%s", $Route->controller, $Route->method))
                ->name($Route->route);
        }
    }
    private function delete($Route){
        if ($this->middleware($Route)) {
            Route::delete($this->pattern($Route), sprintf("%s@%s", $Route->controller, $Route->method))
                ->name($Route->route)->middleware($Route->middleware);
        } else {
            Route::delete($this->pattern($Route), sprintf("%s@%s", $Route->controller, $Route->method))
                ->name($Route->route);
        }
    }
    private function any($Route){
        if ($this->middleware($Route)) {
            Route::any($this->pattern($Route), sprintf("%s@%s", $Route->controller, $Route->method))
                ->name($Route->route)->middleware($Route->middleware);
        } else {
            Route::any($this->pattern($Route), sprintf("%s@%s", $Route->controller, $Route->method))
                ->name($Route->route);
        }
    }

    private function get($Route){
        if ($this->middleware($Route)) {
            Route::get($this->pattern($Route), sprintf("%s@%s", $Route->controller, $Route->method))
                ->name($Route->route)->middleware($Route->middleware);
        } else {
            Route::get($this->pattern($Route), sprintf("%s@%s", $Route->controller, $Route->method))
                ->name($Route->route);
        }
    }

    private function print($Route){
        if ($this->middleware($Route)) {
            Route::get(sprintf("%s/{id}/imprimir",$Route->slug), sprintf("%s@%s", $Route->controller, "print"))
                ->name(sprintf('admin.%s.print', $Route->route))->middleware($Route->middleware);
        } else {
            Route::get(sprintf("%s/{id}/imprimir",$Route->slug), sprintf("%s@%s", $Route->controller, "print"))
                ->name(sprintf('admin.%s.print', $Route->route));
        }
    }
    private function find($Route){
        if ($this->middleware($Route)) {
            Route::get(sprintf("%s/find/select",$Route->slug), sprintf("%s@%s", $Route->controller, "find"))
                ->name(sprintf('admin.%s.find', $Route->route))->middleware($Route->middleware);
        } else {
            Route::get(sprintf("%s/find/select",$Route->slug), sprintf("%s@%s", $Route->controller, "find"))
                ->name(sprintf('admin.%s.find', $Route->route));
        }
    }

    private function middleware($Route){
        if (!is_null($Route->middleware) && strlen($Route->middleware)  > 0) {
           return true;
        }
        return false;
    }

    private function pattern($resource){

        if(!empty($resource->pattern)){
          return sprintf("%s/%s", $resource->slug, $resource->pattern);
        }

        return $resource->slug;
    }


}

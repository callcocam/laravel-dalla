<?php

namespace App\Http\Controllers;

use App\AbstractForm;
use App\AbstractModel;
use App\AbstractRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $results = [];
    /**
     * @var AbstractModel
     */
    protected $model;

    /**
     * @var AbstractRequest
     */
    protected $rules;

    /**
     * @var AbstractForm
     */
    protected $formClass;

    /**
     * @return AbstractModel
     */
    protected function getModel(){

        if(is_string($this->model)){

            $this->model = new $this->model;
        }

        return $this->model;
    }

    /**
     * @return AbstractModel
     */
    protected function getSource(){

        if(is_string($this->model)){

            $this->model = $this->model::query();
        }

        return $this->model;
    }

    protected function getRules($data){

        if(!$this->rules){

            return [];

        }
        $this->rules = new $this->rules;

        return $this->rules->getRules($data);

    }
}

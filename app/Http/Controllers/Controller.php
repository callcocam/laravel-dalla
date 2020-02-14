<?php

namespace App\Http\Controllers;

use App\AbstractForm;
use App\AbstractRequest;
use App\TraitModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $results = [];
    /**
     * @var TraitModel
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

    protected $event;

    /**
     * @return mixed
     */
    /**
     * @param $handler
     * @return void
     */
    public function setEvent($handler)
    {

        event(new $this->event($handler));
    }

    /**
     * @return TraitModel
     */
    protected function getModel(){

        if(is_string($this->model)){

            $this->model = new $this->model;
        }

        return $this->model;
    }

    /**
     * @return TraitModel
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

    protected function get(){

        $requests = request()->query();
        $data =[];

        if($requests):

            foreach ($requests as $key => $request){
               $data[$key] = $request;
            }

        endif;
    }
}

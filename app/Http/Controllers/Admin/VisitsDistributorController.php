<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Http\Controllers\Admin;


use App\Events\VisitorEvent;
use App\Forms\VisitsDistributorForm;
use App\Http\Requests\VisitsDistributorStore;
use App\Model\Admin\VisitsDistributor;

class VisitsDistributorController extends AbstractController
{

   protected $template = 'visits-distributors';

   protected $model = VisitsDistributor::class;

   protected $formClass = VisitsDistributorForm::class;

   protected $event = VisitorEvent::class;

    /**
     * Store a newly created resource in storage.
     *
     * @param VisitsDistributorStore $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisitsDistributorStore $request)
    {
        return $this->save($request);
    }
}

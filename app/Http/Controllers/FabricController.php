<?php

namespace App\Http\Controllers;

use App\Fabric;
use App\Forms\FabricForm;
use App\Http\Requests\StokeStore;

class FabricController extends AbstractController
{
    protected $template = 'fabrics';

    protected $model = Fabric::class;

    protected $formClass = FabricForm::class;
    /**
     * Store a newly created resource in storage.
     *
     * @param StokeStore $request
     * @return \Illuminate\Http\Response
     */
    public function store(StokeStore $request)
    {
        return $this->save($request);
    }
}

<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */
namespace App\Http\Controllers;

use App\Aviament;
use App\Forms\AviamentForm;
use App\Http\Requests\StokeStore;

class AviamentController extends AbstractController
{
    protected $template = 'aviaments';

    protected $model = Aviament::class;

    protected $formClass = AviamentForm::class;
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

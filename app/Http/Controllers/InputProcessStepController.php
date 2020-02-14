<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */
namespace App\Http\Controllers;

use App\Forms\InputProcessStepForm;
use App\Http\Requests\InputProcessStepStore;
use App\InputProcessStep;

class InputProcessStepController extends AbstractController
{
    protected $template = 'inputs';

    protected $model = InputProcessStep::class;

    protected $formClass = InputProcessStepForm::class;
    /**
     * Store a newly created resource in storage.
     *
     * @param InputProcessStepStore $request
     * @return \Illuminate\Http\Response
     */
    public function store(InputProcessStepStore $request)
    {
        return $this->save($request);
    }
}

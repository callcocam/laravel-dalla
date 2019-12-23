<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Http\Controllers\Admin;


use App\Forms\EventForm;
use App\Http\Requests\EventStore;
use App\Model\Admin\Event;
use Illuminate\Http\Request;

class EventController extends AbstractController
{

   protected $template = 'events';

   protected $model = Event::class;


   protected $formClass = EventForm::class;

    /**
     * Store a newly created resource in storage.
     *
     * @param EventStore $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventStore $request)
    {
        return $this->save($request);
    }
}

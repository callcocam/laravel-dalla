<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Http\Controllers\Admin;


use App\Forms\EventForm;
use App\Model\Admin\Event;

class EventController extends AbstractController
{

   protected $template = 'events';

   protected $model = Event::class;


   protected $formClass = EventForm::class;

}

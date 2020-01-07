<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Http\Controllers\Admin;


use App\Events\PosEvent;
use App\Forms\EventForm;
use App\Http\Requests\EventStore;
use App\Http\Requests\PosEventStore;
use App\Model\Admin\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends AbstractController
{

   protected $template = 'events';

   protected $model = Event::class;


   protected $event = PosEvent::class;

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

    public function task(Request $request, $id){

        $this->results['form'] = null;

        $this->results['user'] = Auth::user();

        $this->results['rows'] = $this->getModel()->findById($id);

        $this->results['tenant'] = get_tenant();

        return view(sprintf('admin.%s.task', $this->template), $this->results);
    }


    public function updateTask(Request $request){


        $rows = $this->getModel()->findById($request->get('event'));

        if($rows){
            $task = $rows->tasks()->where('id',$request->get('id'))->first();

            if($task):
                $task->update(array_merge($task->toArray(),$request->all()));
            else:
                $rows->tasks()->create($request->all());
            endif;
        }

        return $rows->jsonTasks();
    }

    public function posEvent(PosEventStore $request){


        $rows = $this->getModel()->findById($request->get('event_id'));

        if($rows){
            $posEvent = $rows->pos_event()->first();

            if($posEvent):
                $posEvent->saveBy($request->all());

                if($posEvent->getResultLastId()){
                    return response()->json([
                        'type'=>'success',
                        'message'=>$posEvent->getMessage()
                    ]);

                }
            endif;
        }

        return response()->json([
            'type'=>'danger',
            'message'=>$posEvent->getMessage()
        ], 500);
    }


    public function deleteTask(Request $request){

        $rows = $this->getModel()->findById($request->get('event'));

        if($rows){
            $task = $rows->tasks()->where('id',$request->get('id'))->first();

            if($task):
                $task->delete();
            endif;
        }

        return $rows->jsonTasks();
    }
}

<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Http\Controllers\Admin;


use App\Events\PosLastEvent;
use App\Forms\EventLastForm;
use App\Http\Requests\EventNextStore;
use App\Http\Requests\PosEventStore;
use App\Model\Admin\EventLast;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventLastController extends AbstractController
{

   protected $template = 'events-last';

   protected $model = EventLast::class;


   protected $event = PosLastEvent::class;

   protected $formClass = EventLastForm::class;

   public function index()
   {

       $this->getSource()->orderBy('start_event')->whereBetween('start_event', [
           Carbon::now()->subMonths(100)->startOfMonth(),
           Carbon::now()
       ]);

       return parent::index();
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventNextStore $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventNextStore $request)
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
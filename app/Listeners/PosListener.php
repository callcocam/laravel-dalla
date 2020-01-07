<?php

namespace App\Listeners;

use App\Model\Admin\PosEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PosListener
{
    /**
     * @var PosEvent
     */
    private $posEvent;

    /**
     * Create the event listener.
     *
     * @param PosEvent $posEvent
     */
    public function __construct(PosEvent $posEvent)
    {
        //
        $this->posEvent = $posEvent;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $event = $event->event;

        if($event->pos_event()->first()){

            return true;

        }

        $event->pos_event()->getRelated()->saveBy([
            'event_id'=>$event->id,
            'status'=>'published',
            'updated_at'=>date("y-m-d")
        ]);
    }
}

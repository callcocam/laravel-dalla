<?php

namespace App\Events;

use App\Model\Admin\Event;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PosEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var Event
     */
    public $event;

    public $_request;

    /**
     * Create a new event instance.
     *
     * @param Event $event
     * @param $request
     */
    public function __construct(Event $event,$request)
    {


        $this->event = $event;
        $this->_request = $request;
    }

}

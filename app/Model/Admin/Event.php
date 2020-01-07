<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Model\Admin;


use App\AbstractModel;

class Event extends AbstractModel
{
    protected $fillable = [
        'user_id','name','slug','contractor','observations','pre_checklist','general_observations','start_event','end_event', 'consumption','status', 'description','updated_at',
    ];


    protected $dates = [
        'start_event','end_event','updated_at'
    ];

    protected $casts = [
        'start_event'=>'date:d-m-Y','end_event'=>'datetime:d-m-Y','updated_at'=>'date:d-m-Y'
    ];

    public function pos_event(){

        return $this->hasOne(PosEvent::class);
    }

    public function pos_eventJson(){

        return json_encode($this->hasOne(PosEvent::class)->first([
            'id','event_id','customer_service', 'draft_beer_quality','event_structure','amount_beer_consumed',
            'make_new_event','team_uniform','status', 'pos_description','updated_at'
        ])->toArray());
    }


    public function tasks(){

        return $this->morphOne(Task::class, 'taskable');
    }

    public function jsonTasks(){

        $tasks = $this->morphOne(Task::class, 'taskable')->get(['id', 'name', 'slug', 'description', 'status']);

        if($tasks->count()){

            return json_encode($tasks->toArray());
        }
        return json_encode([]);
    }

}

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
        'user_id','name','slug','subtitle','start_event','end_event', 'consumption', 'description','updated_at',
    ];

    protected $casts = [
        'start_event'=>'date:d/m/Y','end_event'=>'date:d/m/Y'
    ];
    public function tasks(){

        return $this->morphOne(Task::class, 'taskable');
    }

    public function getEndEventAttribute($value)
    {

        return $value;
    }
}

<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Model\Admin;


use App\AbstractModel;

class EventTask extends AbstractModel
{
    protected $fillable = [
        'user_id','task_id','event_id','name','date_limit','description','status','updated_at',
    ];


    protected $casts = [
        'updated_at'=>'date:d-m-Y'
    ];


}

<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Model\Admin;


use App\AbstractModel;

class Task extends AbstractModel
{
    protected $fillable = [
        'user_id','name','slug', 'description','updated_at',
    ];

    public function taskable(){

        return $this->morphTo();
    }
}

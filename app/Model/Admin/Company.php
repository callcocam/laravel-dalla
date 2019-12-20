<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Model\Admin;


use App\AbstractModel;

class Company extends AbstractModel
{
    protected $fillable = [
        'user_id','name', 'email', 'phone', 'document','updated_at',
    ];

    public function address(){

        return $this->morphOne(Addres::class, 'addresable');
    }
}

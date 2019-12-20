<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Model\Admin;

use App\AbstractModel;

class Admin extends AbstractModel
{

    protected $table = "users";

    protected $fillable = [
        'user_id','name', 'email', 'phone', 'document', 'birthday', 'gender','updated_at',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function address(){

        return $this->morphOne(Addres::class, 'addresable');
    }
}

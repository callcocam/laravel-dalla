<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Model\Admin;
use App\AbstractModel;
use App\Suports\Shinobi\Concerns\HasRolesAndPermissions;

class User extends AbstractModel
{
 use HasRolesAndPermissions;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','slug', 'email','phone','document', 'password', 'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','email_verified_at'
    ];

    public function address(){

        return $this->morphOne(Addres::class, 'addresable');
    }


    public function orders(){

        return $this->hasMany(Order::class);
    }

    public function getAddressAttribute(){

        return $this->address()->first(['zip','city','state','country', 'street','district','number','complement']);
    }
}

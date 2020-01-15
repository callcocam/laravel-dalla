<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Model\Admin;


use App\AbstractModel;
use Illuminate\Support\Facades\DB;

class Order extends AbstractModel
{
    protected $fillable = [
        'user_id','number','client_id','price','discount','affix','total','delivery_date','status', 'description','updated_at',
    ];


    public function items(){

        return $this->hasMany(Item::class);
    }
    public function client(){

        return $this->belongsTo(Client::class);
    }
}

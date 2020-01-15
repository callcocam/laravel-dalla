<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Model\Admin;


use App\AbstractModel;
use Illuminate\Support\Facades\DB;

class Product extends AbstractModel
{
    protected $fillable = [
        'user_id','name','slug','price','stock','status', 'description','updated_at',
    ];

    public function items(){

        return $this->hasMany(Item::class);
    }

    public function countItems(){

        $data = $this->items()->select( DB::raw('sum( amount ) as quantity') )->first();

        if($data)
            return $data->quantity;

        return '0';
    }
}

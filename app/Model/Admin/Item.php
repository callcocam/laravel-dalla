<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Model\Admin;


use App\AbstractModel;
use Illuminate\Support\Facades\DB;

class Item extends AbstractModel
{
    protected $fillable = [
        'user_id','order_id','product_id','amount','price','total','status', 'description','updated_at',
    ];


    public function saveBy($data)
    {

        $product = Product::find($data['product_id']);

        if(!$product){
            $this->messages = "Falhou, não foi possivel adicionar o registro, modelo não foi encontrado!!";
            return false;
        }
        $data['total'] = form_w(Calcular(form_read($data['amount']), form_read($product->price), '*'));
        $data['price'] = $product->price;

        $result =  parent::saveBy($data);

        if($this->getResultLastId()){

            $sum = $this->model->select( DB::raw('sum( total ) as valor') )->where('order_id',$data['order_id'])->first();

            $order = $this->model->order()->first();

            $order->total = $sum->valor;
            $order->price = $sum->valor;

            $order->update();

        }

        return $result;
    }

    public function deleteBy($model)
    {
        $result =  parent::deleteBy($model);

        if($result){

            $sum = $model->select( DB::raw('sum( total ) as valor') )->first();

            $order = $model->order()->first();

            $order->total = $sum->valor;

            $order->update();

        }

        return $result;
    }

    public function products(){

        return $this->belongsTo(Product::class,'product_id');
    }

    public function order(){

        return $this->belongsTo(Order::class);
    }
}

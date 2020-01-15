<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Http\Controllers\Admin;




use App\Forms\OderForm;
use App\Http\Requests\OrderStore;
use App\Model\Admin\Order;
use App\Model\Admin\Product;

class OrderController extends AbstractController
{

   protected $template = 'orders';

   protected $model = Order::class;

   protected $formClass = OderForm::class;


    /**
     * Store a newly created resource in storage.
     *
     * @param OrderStore $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderStore $request)
    {
        return $this->save($request);
    }

    public function edit($id)
    {
        $this->results['products'] = Product::query()->where('stock','>','0')->get(['id','name']);

        return parent::edit($id);
    }
}

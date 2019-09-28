<?php
namespace App\Repositories;
use App\Repositories\Interfaces\OrderRepositoryInterface;


use App\OrderPart;
use App\Order;
use Session;



class OrderRepository implements OrderRepositoryInterface {

    public function saveTheOrder(){

        $cart = Session::get('auth()->user()->id');
 

        $order = Order::create([
            'user_id' => auth()->user()->id
        ]);


        foreach($cart as $key => $value){

            OrderPart::create([
                'order_id' => $order->id,
                'product_id' => $cart[$key]['product_id'],
                'quantity' => $cart[$key]['quantity']
            ]);
        }

        Session::put('auth()->user()->id', []);  
    }
}
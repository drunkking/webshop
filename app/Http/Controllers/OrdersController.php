<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\OrderPart;
use App\Order;
use Session;

class OrdersController extends Controller
{
    public function store(Request $request)
    {

        $cart = Session::get('auth()->user()->id');

        
        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->save();


        foreach($cart as $key => $value){
            $orderPart = new OrderPart;
            $orderPart->order_id = $order->id;
            $orderPart->product_id = $cart[$key]['product_id'];
            $orderPart->quantity = $cart[$key]['quantity'];
            $orderPart->save();
        }


        Session::put('auth()->user()->id', []);  

        return redirect('/')
            ->with('success','GOOD');
    }
}

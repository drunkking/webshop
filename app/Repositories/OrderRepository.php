<?php
namespace App\Repositories;
use App\Repositories\Interfaces\OrderRepositoryInterface;

use Illuminate\Support\Facades\DB;

use App\OrderPart;
use App\Order;
use App\User;
use App\Product;

use Session;



class OrderRepository implements OrderRepositoryInterface {


    public function all(){

        return Order::orderBy('created_at','desc')->paginate(10);
    }

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

    public function customerOrders($customer_id){
        
        return DB::table('orders')
            ->where('user_id',$customer_id)
            ->paginate(10);
    }

    public function customerOrderDetails($customer_id){

        $order = Order::findOrFail($customer_id);
        $orderParts = OrderPart::where('order_id',$order->id)->get();

        foreach($orderParts as $part){
            $part['product'] = Product::findOrFail($part->product_id);
        }

        $orderDetails = [
            'order' => $order,
            'orderParts' => $orderParts
        ];

        return $orderDetails;
    }
}
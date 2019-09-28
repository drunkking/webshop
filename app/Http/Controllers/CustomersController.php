<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;

class CustomersController extends Controller
{
    public function orders(){
        
        $orders = DB::table('orders')->where('user_id',auth()->user()->id)->paginate(10);
        return view('customers.orders')
            ->with('orders', $orders);
        
    }

    public function profile(){
        return view('customers.profile');
    }

}

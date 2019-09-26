<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;


class PagesController extends Controller
{
    
    public function index(){
        
        $cart = Session::get('auth()->user()->id');

        $products = Product::orderBy('created_at','desc')->paginate(10);
        return view('pages.index')
            ->with('products',$products)
            ->with('cart', $cart);
    }

    public function chout(){

        $cart = Session::get('auth()->user()->id');
        $toPay = 0;

        foreach($cart as $key => $value){
            $toPay += $cart[$key]['price'] * $cart[$key]['quantity'];
        }

        return view('pages.chout')
            ->with('cart',$cart)
            ->with('topay',$toPay);
    }
}

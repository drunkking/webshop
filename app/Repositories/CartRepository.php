<?php

namespace App\Repositories;
use App\Repositories\Interfaces\CartRepositoryInterface;
use Session;

class CartRepository implements CartRepositoryInterface {


    public function addProductToCart($request){

        $currData = Session::get('auth()->user()->id');

        $data = [
            'product_id' => $request->input('product_id'),
            'name' => $request->input('name'),
            'user_id' => auth()->user()->id,
            'price' => $request->input('price'),
            'quantity' => 1
        ];


        $isNew = true;

        if(!empty($currData)){
            foreach($currData as $key => $value){
                if($currData[$key]['product_id'] == $data['product_id']){ 
                    $currData[$key]['quantity'] += 1;
                    $isNew = false;
                }
            }
        }

        if($isNew){
            Session::push('auth()->user()->id', $data);
        } else {
            Session::put('auth()->user()->id', $currData);
        }
    }


    public function removeProductFromCart($request){

        $currData = Session::get('auth()->user()->id');

        $data = [
            'product_id' => $request->input('product_id')
        ];

   
        foreach($currData as $key => $value){
            if($currData[$key]['product_id'] == $data['product_id']){

                if($currData[$key]['quantity'] == 1){
                    unset($currData[$key]);    
                } else {
                    $currData[$key]['quantity'] -= 1;
                } 
 
            }
        }

        Session::put('auth()->user()->id', $currData);
    }

}
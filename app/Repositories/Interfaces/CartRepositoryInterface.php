<?php

namespace App\Repositories\Interfaces;


interface CartRepositoryInterface {

    public function addProductToCart($request);
    
    public function removeProductFromCart($request);

}
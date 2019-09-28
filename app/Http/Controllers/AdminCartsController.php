<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Http\Requests\CartRemoveRequest;

use App\Repositories\Interfaces\CartRepositoryInterface;
use Session;

class AdminCartsController extends Controller
{

    private $cartRepository;

 
    public function __construct(CartRepositoryInterface $cartRepository){
        $this->cartRepository = $cartRepository;
    }

    public function store(CartRequest $request)
    {
              
        $this->cartRepository->addProductToCart($request);
        return redirect('/chout');
    }

    public function storeHome(CartRequest $request)
    {
      
        $this->cartRepository->addProductToCart($request);
        return redirect('/');
    }


    public function change(CartRemoveRequest $request){
        
        $this->cartRepository->removeProductFromCart($request);
        return redirect('/chout');
    }

}

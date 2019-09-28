<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Repositories\Interfaces\OrderRepositoryInterface;
                               

class OrdersController extends Controller
{

    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository){
                               
        $this->orderRepository = $orderRepository;
    }

    public function store(Request $request)
    {

        $this->orderRepository->saveTheOrder();
        return redirect('/')
            ->with('success','GOOD');
    }
}

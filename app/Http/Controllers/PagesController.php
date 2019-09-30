<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Product;
use App\Category;
use Session;


class PagesController extends Controller
{

    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository){
        $this->productRepository = $productRepository;

    }

    
    public function index(){
        
        $cart = Session::get('auth()->user()->id');
        $products = Product::orderBy('created_at','desc')->paginate(10);
        $categories = Category::all();

        return view('pages.index')
            ->with('products',$products)
            ->with('categories', $categories)
            ->with('cart', $cart);
    }


    public function productsWithCategory($category_id)
    {
        $data =  $this->productRepository->productsWithCategory($category_id);
        $cart = Session::get('auth()->user()->id');

        return view('pages.index', $data)
            ->with('cart',$cart);
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

    public function dash(){
        return view('dash');
    }
}

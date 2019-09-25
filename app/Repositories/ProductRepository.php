<?php

namespace App\Repositories;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Product;

class ProductRepository implements ProductRepositoryInterface {
    

    public function all(){

        return Product::orderBy('created_at','desc')->get();
    }

    public function createProduct($request){

        Product::create([
            'name' => $request->input('name'),
            'vendor' => $request->input('vendor'),
            'description' => $request->input('description'),
            'price' => $request->input('price')
        ]);
    }

    public function update($request, $product_id){

        $product = Product::findOrFail($product_id);

        $product->update([
            'name' => $request->input('name'),
            'vendor' => $request->input('vendor'),
            'description' => $request->input('description'),
            'price' => $request->input('price')
        ]);
    }

    public function withId($product_id) {

        return Product::findOrFail($product_id);
    }

    public function delete($product_id){

        $product = Product::findOrFail($product_id);
        $product->delete();
    }
}
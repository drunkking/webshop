<?php

namespace App\Repositories;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Category;

class ProductRepository implements ProductRepositoryInterface {
    

    public function all(){

        return Product::orderBy('created_at','desc')->get();
    }

    public function imageCreateSetup($request){

        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('image')->storeAs('public/product_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'empty.jpg';
        }

        return $fileNameToStore;
    }

    public function imageUpdateSetup($request){

        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('image')->storeAs('public/product_images', $fileNameToStore);


            return $fileNameToStore;
        } 
    }


    public function createProduct($request){

        $fileNameToStore = $this->imageCreateSetup($request);

        Product::create([
            'name' => $request->input('name'),
            'vendor' => $request->input('vendor'),
            'description' => $request->input('description'),
            'image' => $fileNameToStore,
            'category_id' => $request->input('category_id'),
            'price' => $request->input('price')
        ]);

    }

    public function update($request, $product_id){

        $product = Product::findOrFail($product_id);
        $fileNameToStore = $this->imageUpdateSetup($request);

        

        $product->update([
            'name' => $request->input('name'),
            'vendor' => $request->input('vendor'),
            'description' => $request->input('description'),
            'image' => $request->hasFile('image') ? $fileNameToStore : $product->image,
            'category_id' => $request->input('category_id'),
            'price' => $request->input('price')
        ]);

    }

    public function withId($product_id) {

        return Product::findOrFail($product_id);
    }


    

    public function productsWithCategory($category_id){

        $category = Category::where('id', $category_id)->first();
        $categories = Category::all();

        if($category){
            $products = Product::where('category_id', $category->id)->get();

            $data = [
                'products' => $products,
                'categories' => $categories
            ];

            return $data;
        } else {
            abort(404);
        }

    }

    public function delete($product_id){

        $product = Product::findOrFail($product_id);

        if($product->image != 'empty.jpg'){
            Storage::delete('public/product_images/'.$product->image);
        }

        $product->delete();
    }
}
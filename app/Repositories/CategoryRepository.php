<?php

namespace App\Repositories;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Category;

class CategoryRepository implements CategoryRepositoryInterface {
    
    public function all(){
        
        return Category::orderBy('created_at','desc')->get();
    }

    public function createCategory($request){
        
        Category::create([
            'name' => $request->input('name')
        ]);
    }

    public function update($request, $category_id){

        $category = Category::findOrFail($category_id);

        $category_id->update([
            'name' => $request->input('name')
        ]);
    }

    public function withId($category_id){
        
        return Category::findOrFail($category_id);
    }

    public function delete($category_id){

        $category = Category::findOrFail($category_id);
        $category->delete();
    }
}
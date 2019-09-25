<?php

namespace App\Repositories\Interfaces;


interface CategoryRepositoryInterface {
    
    public function all();

    public function createCategory($request);

    public function update($request, $category_id);

    public function withId($category_id);

    public function delete($category_id);

}
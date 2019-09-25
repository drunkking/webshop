<?php

namespace App\Repositories\Interfaces;


interface ProductRepositoryInterface {
    
    public function all();

    public function createProduct($request);

    public function update($request, $product_id);

    public function withId($product_id);

    public function delete($product_id);
}
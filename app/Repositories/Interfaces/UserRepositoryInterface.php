<?php

namespace App\Repositories\Interfaces;


interface UserRepositoryInterface {
    
    public function all();

    public function allCustomers();

    public function createUser($request);

    public function createUserCustomer($request);

    public function update($request, $user_id);

    public function updateCustomer($request, $user_id);

    public function withId($user_id);

    public function withCustomerId($user_id);

    public function delete($user_id);

}
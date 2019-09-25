<?php

namespace App\Repositories\Interfaces;


interface UserRepositoryInterface {
    
    public function all();

    public function createUser($request);

    public function update($request, $user_id);

    public function withId($user_id);

    public function delete($user_id);

}
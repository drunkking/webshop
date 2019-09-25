<?php

namespace App\Repositories;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Role;

class RoleRepository implements RoleRepositoryInterface {
    
    public function all(){
        
        return Role::pluck('name','id')->toArray();
    }


}
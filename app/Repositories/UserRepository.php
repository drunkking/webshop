<?php

namespace App\Repositories;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\User;

class UserRepository implements UserRepositoryInterface {
    
    public function all(){
        
        return User::orderBy('created_at','desc')->paginate(10);
    }

    public function createUser($request){

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role_id' => $request->input('role_id')
        ]);
    }

    public function update($request, $user_id){

        $user = User::findOrFail($user_id);

        
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role_id')
        ]);

    }

    public function withId($user_id){

        return User::findOrFail($user_id);
    }

    public function delete($user_id){

        //TODO:  prevent user to delete own acc during session auth()->user()->id != user_id ....
        $user = User::findOrFail($user_id);
        $user->delete();
    }

}
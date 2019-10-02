<?php

namespace App\Repositories;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\User;

class UserRepository implements UserRepositoryInterface {
    
    public function all(){
        
        return User::orderBy('created_at','desc')->paginate(10);
    }

    public function allCustomers(){

        return User::where('role_id','=',3)
            ->orderBy('created_at','desc')
            ->paginate(10);
    }

    public function createUser($request){

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role_id' => $request->input('role_id')
        ]);
    }

    public function createUserCustomer($request){

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
    }

    public function update($request, $user_id){

        $user = User::findOrFail($user_id);

        
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role_id'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'zip_code' => $request->input('zip_code'),
            'phone' => $request->input('phone')
        ]);

    }


    public function updateCustomer($request, $user_id){

        $user = User::findOrFail($user_id);

        
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'zip_code' => $request->input('zip_code'),
            'phone' => $request->input('phone')
        ]);

    }




    public function withId($user_id){

        return User::findOrFail($user_id);
    }

    public function withCustomerId($user_id){

        $user =  User::findOrFail($user_id);

        //TODO: write methods to check this, don't use magic numbers  bool isOk();
        if($user->role_id  == 1 || $user->role_id == 2 ){
            return abort(403);
        } else {
            return $user;
        }
    }

    public function delete($user_id){

        //TODO:  prevent user to delete own acc during session auth()->user()->id != user_id ....
        $user = User::findOrFail($user_id);
        $user->delete();
    }

}
<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;


use App\Http\Requests\UserCustomerUpdateRequest;
use App\Http\Requests\UserCustomerStoreRequest;

class ModeratorUsersController extends Controller
{

    private $roleRepository;
    private $userRepository;

    public function __construct(RoleRepositoryInterface $roleRepository,
                                UserRepositoryInterface $userRepository){
            
        $this->roleRepository = $roleRepository;
        $this->userRepository = $userRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  $this->userRepository->allCustomers();
        return view('moderator.users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleRepository->all();
        return view('moderator.users.create')
            ->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCustomerStoreRequest $request)
    {
        $this->userRepository->createUserCustomer($request);
        return redirect('moderator/users')
            ->with('success','User created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = $this->roleRepository->all();
        $user = $this->userRepository->withCustomerId($id);

        return view('moderator.users.edit')
            ->with('user', $user)
            ->with('roles', $roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserCustomerUpdateRequest $request, $id)
    {
        $this->userRepository->updateCustomer($request, $id);

        return redirect('moderator/users')
            ->with('success','User updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userRepository->delete($id);

        return redirect('/moderator/users')
            ->with('success','User deleted');
    }
}

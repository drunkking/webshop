<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class AdminCartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
              
        $this->validate($request,[
            'product_id' => 'required',
            'price' => 'required',
            'name' => 'required'
        ]);

        $currData = Session::get('auth()->user()->id');

        $data = [
            'product_id' => $request->input('product_id'),
            'name' => $request->input('name'),
            'user_id' => auth()->user()->id,
            'price' => $request->input('price'),
            'quantity' => 1
        ];


        $isNew = true;

        if(!empty($currData)){
            foreach($currData as $key => $value){
                if($currData[$key]['product_id'] == $data['product_id']){ 
                    $currData[$key]['quantity'] += 1;
                    $isNew = false;
                }
            }
        }

        if($isNew){
            Session::push('auth()->user()->id', $data);
        } else {
            Session::put('auth()->user()->id', $currData);
        }


        return redirect('/chout');
    }

    public function storeHome(Request $request)
    {
      
        $this->validate($request,[
            'product_id' => 'required',
            'price' => 'required',
            'name' => 'required'
        ]);

        $currData = Session::get('auth()->user()->id');

        $data = [
            'product_id' => $request->input('product_id'),
            'name' => $request->input('name'),
            'user_id' => auth()->user()->id,
            'price' => $request->input('price'),
            'quantity' => 1
        ];


        $isNew = true;

        if(!empty($currData)){
            foreach($currData as $key => $value){
                if($currData[$key]['product_id'] == $data['product_id']){ 
                    $currData[$key]['quantity'] += 1;
                    $isNew = false;
                }
            }
        }

        if($isNew){
            Session::push('auth()->user()->id', $data);
        } else {
            Session::put('auth()->user()->id', $currData);
        }


        return redirect('/');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function change(Request $request){
        
        $this->validate($request,[
            'product_id' => 'required'
        ]);

        $currData = Session::get('auth()->user()->id');

        $data = [
            'product_id' => $request->input('product_id')
        ];

   

        foreach($currData as $key => $value){
            if($currData[$key]['product_id'] == $data['product_id']){

                if($currData[$key]['quantity'] == 1){
                  unset($currData[$key]);    
                } else {
                    $currData[$key]['quantity'] -= 1;
                } 
 
            }
        }

     
        Session::put('auth()->user()->id', $currData);

        return redirect('/chout');
    }

}

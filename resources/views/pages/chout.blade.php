@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        @if(!empty($cart))
        
        <table class="table table-dark">
            <thead>
                <tr>
                    <th colspan="3">Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($cart as $item)
                  
                    <tr>
                        <td>{{$item['product_id']}}</td>
                        <td>image</td>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['quantity']}}</td>
                        <td>{{$item['price'] * $item['quantity']}}</td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">                    
                            {!! Form::open(['action' => 'CartsController@store',  'method'=>'POST']) !!}
                                <input type="hidden" name="product_id" value="{{$item['product_id']}}"></input>
                                <input type="hidden" name="price" value="{{$item['price']}}"></input>
                                <input type="hidden" name="name" value="{{$item['name']}}"></input>
                            {{Form::submit('Add',['class' => 'btn btn-success'])}}
                            {!! Form::close() !!}  

                            {!! Form::open(['action' => 'CartsController@change',  'method'=>'POST']) !!}
                                  <input type="hidden" name="product_id" value="{{$item['product_id']}}"></input>
                                {{Form::submit('Remove',['class' => 'btn btn-danger'])}}
                            {!! Form::close() !!}  
                            </div>         
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="6">
                        <h4 class="float-right">To Pay {{$topay}} RSD</h4>
                        {!! Form::open(['action'=> 'OrdersController@store','method' => 'POST'])!!}

                            <div classs="form-group">
                                {{Form::label('message','Messsage')}}
                                {{Form::textarea('message','',['class' =>'form-control','rows' => '4'])}}
                            </div>
                            <br>

                            {{Form::submit('Submit purchase',['class' => 'btn btn-primary'])}}
                        {!! Form::close() !!}
                    </td>
                </tr>
            </tbody>
        </table>

@else
    <h5>Cart is empty</h5>
@endif
        
    </div>
</div>

@endsection
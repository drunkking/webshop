@extends('layouts.app')

@section('content')

<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Webshop</h1>
      <p class="lead">Order whatever you want, order whatever you can pay for, we are waiting for your order.</p>
    </div>
  </div>


@include('inc.navCategory')
<h1>Buy Our products</h1>
<div class="row justify-content-center">
            @if(isset($products))
                @foreach ($products as $product)
                    <div class="col-6 col-md-6 col-lg-3">                          
                        {!! Form::open(['action' => 'CartsController@storeHome', 'method'=>'POST']) !!}
                            <div class="card">
                                <div class="card-header">
                                    <input type="hidden" name="product_id" value="{{$product->id}}"></input>
                                    <input type="hidden" name="name" value="{{$product->name}}"></input>
                                    <input type="hidden" name="image" value="{{$product->image}}"></input>
                                    {{$product->name}}
                                </div>
                                <img src="/storage/product_images/{{$product->image}}" class="card-img-top" alt="..."  height="230px">
                                <div class="card-body">
                                    <p class="card-title">{{$product->vendor}}</p>
                                    <input type="hidden" name="price" value="{{$product->price}}"></input>
                                    <p class="card-text">Price: {{$product->price}} RSD</p>
                                    {{Form::submit('Add To Cart',['class' => 'btn btn-primary'])}}
                                </div>
                            </div>
                        {!! Form::close() !!}
                        <br>
                    </div>              
                @endforeach
            @else 
                <h1>Nema nista</h1>
            @endif
    </div>
    
    
@endsection
@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
        <div class="col-lg-12">
            <h1>Buy Our products</h1>
    
       

            @if(isset($products))

                @foreach ($products as $product)
                    <div class="col-lg-4">
                                                   
                        {!! Form::open(['action' => 'AdminCartsController@storeHome', 'method'=>'POST']) !!}

                        <div class="card">
                            <div class="card-header">
                                <input type="hidden" name="product_id" value="{{$product->id}}"></input>
                                <input type="hidden" name="name" value="{{$product->name}}"></input>
                                {{$product->name}}
                            </div>
                            <div class="card-body">
                                <p class="card-title">{{$product->vendor}}</p>
                                <input type="hidden" name="price" value="{{$product->price}}"></input>
                                <p class="card-text">{{$product->price}}</p>
                                {{Form::submit('Add To Cart',['class' => 'btn btn-primary'])}}
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                    <br>
                    
                @endforeach
            @else 
                <h1>Nema nista</h1>
            @endif
        </div>
    </div>
    
    
@endsection
@extends('layouts.app')


@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <h2>All products</h2>
            <a href="products/create" class="btn btn-primary">Create Product</a>
            <hr>
            @if(!empty($products))
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Vendor</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th colspan="2">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td><img src="/storage/product_images/{{$product->image}}" class="img" width="120px" height="100px"></td>
                            <td>{{$product->vendor}}</td>
                            <td>{{ substr($product->description,0,100).'...'}}</td>
                            <td>{{$product->price}}</td>
                            <td><a href="products/{{$product->id}}/edit" class="btn btn-success">Edit</a></td>
                            <td>
                                {!! Form::open(['action' => ['ModeratorProductsController@destroy', $product->id], 'method' => 'POST']) !!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
               </table>    
               {{$products->links()}}      
            @else 
                <h4>No products, yet</h4>
            @endif
        </div>
    </div>

@endsection
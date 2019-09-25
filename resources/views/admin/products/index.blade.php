@extends('layouts.app')


@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-10">
                <h2>All products</h2>


            @if(!empty($products))
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Vendor</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->vendor}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                    {!! Form::open(['action' => ['AdminProductsController@destroy', $product->id], 'method' => 'POST']) !!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                    {!! Form::close() !!}
                                </td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
               </table>          
            @else 
                <h4>No products, yet</h4>
            @endif
        </div>
    </div>

@endsection
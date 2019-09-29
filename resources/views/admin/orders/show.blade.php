@extends('layouts.app')

@section('content')

<h1>Order</h1>
<table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>Createad at</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$order->id}}</td>
                <td>in process</td>
                <td>{{$order->created_at}}</td>
            </tr>

        </tbody>
    </table>
<hr>
<h1>Order Parts</h1>
<table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product ID</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderParts as $part)
            <tr>
                <td>{{$part->id}}</td>
                <td>{{$part->product->name}}</td>
                <td>{{$part->quantity}}</td>           
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
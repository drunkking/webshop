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
            <tr>
                <td>Message: {{$order->message}}</td>
            </tr>
        </tbody>
    </table>
<hr>
<h1>Order Parts</h1>
<table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product name</th>
                <th>Product vendor</th>
                <th>Product price</th>
                <th>Quantity</th>
                <th>Sum</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderParts as $part)
            <tr>
                <td>{{$part->id}}</td>
                <td>{{$part->product->name}}</td>
                <td>{{$part->product->vendor}}</td>
                <td>{{$part->product->price}}</td>
                <td>{{$part->quantity}}</td>
                <td>{{$part->product->price * $part->quantity}}</td>           
            </tr>
            @endforeach
        </tbody>
    </table>
    <h3 class="float-right">To Pay: {{$topay}} RSD</h3>
@endsection
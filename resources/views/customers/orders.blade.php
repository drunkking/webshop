@extends('layouts.app')

@section('content')
<h1>Users Orders</h1>


<table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>Createad at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>delivered</td>
                <td>{{$order->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $orders->links() }}
 

@endsection
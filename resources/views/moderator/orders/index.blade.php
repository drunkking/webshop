@extends('layouts.app')

@section('content')

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Createad at</th>
            <th colspan="2" class="text-center">Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td><a href="/moderator/users/{{$order->user_id}}">{{$order->user->name}}</a></td>
            <td>{{$order->updated_at->diffForHumans()}}</td>
            <td><a href="/moderator/orders/{{$order->id}}" class="btn btn-info">Show</a></td>
            <td><a href="" class="btn btn-danger">Remove</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $orders->links() }}



@endsection
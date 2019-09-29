@extends('layouts.app')

@section('content')

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Status</th>
            <th>Createad at</th>
            <th colspan="3" class="text-center">Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td><a href="">About user</a></td>
            <td>delivered</td>
            <td>{{$order->updated_at->diffForHumans()}}</td>
            <td><a href="" class="btn btn-success">Approve</a></td>
            <td><a href="" class="btn btn-warning">Edit</a></td>
            <td><a href="" class="btn btn-danger">Remove</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $orders->links() }}



@endsection
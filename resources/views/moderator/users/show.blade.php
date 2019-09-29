@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <h1>User data</h1>

        <ul class="list-group">
            <li class="list-group-item">
                <h3>Name: <span class="badge badge-info">{{$user->name}}</span></h3> 
            </li>
            <li class="list-group-item">
                <h3>Email: <span class="badge badge-info">{{$user->email}}</span></h3> 
            </li>
            <li class="list-group-item">
                <h3>Address: <span class="badge badge-info">{{$user->address}}</span></h3> 
            </li>
            <li class="list-group-item">
                <h3>City: <span class="badge badge-info">{{$user->city}}</span></h3> 
            </li>
            <li class="list-group-item">
                <h3>Zip Code: <span class="badge badge-info">{{$user->zip_code}}</span></h3>      
            </li>
            <li class="list-group-item">
                <h3>Phone: <span class="badge badge-info">{{$user->phone}}</span></h3>  
            </li>
          </ul>

     </div>
</div>

@endsection
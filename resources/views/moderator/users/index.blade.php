@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <h1>All Users</h1>
        <a href="/moderator/users/create" class="btn btn-primary">Create</a>
        <hr>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th colspan="2">Options</th>
            </tr>
            <tr>
                @if(isset($users))
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->name}}</td>
                            <td><a href="/moderator/users/{{$user->id}}/edit" class="btn btn-success">Edit</a></td>
                            <td>
                                {!! Form::open(['action' => ['ModeratorUsersController@destroy', $user->id], 'method' => 'POST']) !!}
                                    @method('DELETE')
                                    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @else 
                    <h1>There is no single one user</h1>
                @endif
            </tr>
        </table>

        {{$users->links()}}
      
    </div>
</div>

@endsection
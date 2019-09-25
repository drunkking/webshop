@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <h1>Create User</h1>

        {!! Form::open(['action' => 'ModeratorUsersController@store','method'=>'POST']) !!}
            <div class="form-group">
                {{Form::label('name','Name')}}
                {{Form::text('name','',['class' => 'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('email','Email')}}
                {{Form::email('email','',['class' => 'form-control'])}}
            </div>


            <div class="form-group">
                {{Form::label('password','Password')}}
                {{Form::password('password',['class' => 'form-control'])}}
            </div>

            {{Form::submit('Create',['class' => 'btn btn-primary'])}}


        {!! Form::close() !!}

      
    </div>
</div>

@endsection
@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <h1>Edit User</h1>

        {!! Form::open(['action' => ['ModeratorUsersController@update', $user->id],'method'=>'POST']) !!}


            <div class="form-group">
                {{Form::label('name','Name')}}
                {{Form::text('name',$user->name,['class' => 'form-control'])}}
            </div>


            <div class="form-group">
                {{Form::label('email','Email')}}
                {{Form::email('email',$user->email,['class' => 'form-control'])}}
            </div>


            @method('PUT')
            {{Form::submit('Save',['class' => 'btn btn-primary'])}}

            
        {!! Form::close() !!}

      
    </div>
</div>

@endsection
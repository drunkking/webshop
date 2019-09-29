@extends('layouts.app')

@section('content')
<h1>User Profile</h1>

{!! Form::open(['action' => ['CustomersController@update',$user->id],'method' => 'POST']) !!}


    <div class="form-group">
        {{Form::label('name','Name')}}
        {{Form::text('name',$user->name,['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('email','Email')}}
        {{Form::email('email',$user->email,['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('address','Address')}}
        {{Form::text('address',$user->address,['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('city','City')}}
        {{Form::text('city',$user->city,['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('zip_code','Zip Code')}}
        {{Form::text('zip_code',$user->zip_code,['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('phone','Phone')}}
        {{Form::text('phone',$user->phone,['class' => 'form-control'])}}
    </div>


    @method('PUT')
    {{Form::submit('Save',['class' => 'btn btn-primary'])}}

{!! Form::close() !!}

@endsection
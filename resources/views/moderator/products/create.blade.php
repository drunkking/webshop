@extends('layouts.app')


@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
    <h2>Create</h2>              
    {!! Form::open(['action' => 'ModeratorProductsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name','Name')}}
            {{Form::text('name','',['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('vendor','Vendor')}}
            {{Form::text('vendor','',['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('category','Category')}}
            {{Form::select('category_id',[''=>'Chose category']+$categories,null,['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('description','Description')}}
            {{Form::textarea('description','',['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('price','Price')}}
            {{Form::text('price','',['class' => 'form-control'])}}
        </div>

        {{Form::submit('Create',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
    </div>
</div>

@endsection
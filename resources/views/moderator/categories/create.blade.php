@extends('layouts.app')


@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
    <h2>Create Category</h2>              
    {!! Form::open(['action' => 'ModeratorCategoriesController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name','Name')}}
            {{Form::text('name','',['class' => 'form-control'])}}
        </div>

        {{Form::submit('Create',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
    </div>
</div>

@endsection
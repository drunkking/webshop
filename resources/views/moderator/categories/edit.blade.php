@extends('layouts.app')


@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
    <h2>Edit Category</h2>              
    {!! Form::open(['action' => ['ModeratorCategoriesController@update', $category->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name','Name')}}
            {{Form::text('name',$category->name,['class' => 'form-control'])}}
        </div>

        @method('PUT')
        {{Form::submit('Save',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
    </div>
</div>

@endsection
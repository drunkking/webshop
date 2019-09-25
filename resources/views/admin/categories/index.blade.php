@extends('layouts.app')


@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-10">
                <h2>All categories</h2>


            @if(!empty($categories))
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>
                                    {!! Form::open(['action' => ['AdminCategoriesController@destroy', $category->id], 'method' => 'POST']) !!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                    {!! Form::close() !!}
                                </td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
               </table>          
            @else 
                <h4>No categories, yet</h4>
            @endif
        </div>
    </div>

@endsection
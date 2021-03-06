@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{$role}}

                    @if(auth()->user()->role->name == 'Admin')
                        @include('inc.navAdmin')      
                    @endif

                    @if(auth()->user()->role->name == 'Moderator')
                        @include('inc.navModerator')
                    @endif

                    @if(auth()->user()->role->name == 'Customer')
                        @include('inc.navCustomer')
                    @endif


                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

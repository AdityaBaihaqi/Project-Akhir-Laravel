@extends('layouts.app')

@section('content')
@if(Auth::user()->role == 'admin')
    <div class="container">
        <div class="jumbotron">
            <h2>
                Kelola User
            </h2>
            <p>
                Ini Halaman Kelola User
            </p>
        </div>
    </div>
@else
    @include('layouts.accessDenied')
@endif
@endsection


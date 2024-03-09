@extends('adminlte::page')
@section('title', 'Detail Kategori')
@section('content_header')
    <h1>Detail Kategori</h1>
@stop
@section('content')
@foreach($ar_kategori as $kat)

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Kategori : {{ $kat->nama }}</h5>
        <br/><br/>
        <a href="{{ url('/kategori') }}" class="btn btn-primary">Go Back</a>
    </div>
</div>

@endforeach
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop

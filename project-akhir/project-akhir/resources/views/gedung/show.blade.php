@extends('adminlte::page')
@section('title', 'Detail Gedung')
@section('content_header')
<h1>Detail Gedung</h1>
@stop
@section('content')

@section('content')
@foreach($ar_gedung as $ged)
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h2 class="card-title">{{ $ged->nama }}</h2>
        <p class="card-text">
                Jumlah: {{ $ged->jumlah }} <br/>
                Nama Barang: {{ $ged->inventaris }} <br/>
                Kategori: {{ $ged->kategori }}
        </p>
        <a href="{{ url('/gedung') }}" class="btn btn-primary">Go Back</a>
    </div>
</div>
@endforeach
@stop

@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi!'); </script>
@stop

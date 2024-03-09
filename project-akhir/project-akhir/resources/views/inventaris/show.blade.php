@extends('adminlte::page')
@section('title', 'Detail Inventaris')
@section('content_header')
<h1>Detail Inventaris</h1>
@stop
@section('content')

@section('content')
@foreach($ar_inventaris as $inv)
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h2 class="card-title">{{ $inv->nama_barang }}</h2>
        <p class="card-text">
                Kategori: {{ $inv->kategori}} <br/>
                Jumlah: {{ $inv->jumlah }} <br/>
                Harga: {{ $inv->harga }} <br/>
                Kondisi: {{ $inv->kondisi }}
        </p>
        <a href="{{ url('/inventaris') }}" class="btn btn-primary">Go Back</a>
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

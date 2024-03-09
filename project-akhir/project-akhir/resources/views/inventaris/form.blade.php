@extends('adminlte::page') 
@section('title','Form Inventaris') 
@section('content_header')
    <h1>Form Inventaris</h1>
@stop 
@section('content')

@php
$rs1 = App\Models\Kategori::all();
@endphp
<!-- general form elements -->
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Inventaris</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('inventaris.store') }}" method="POST">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control"/>
                  </div>
                  <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="kategori_id">
                      <option value="">-- Pilih Kategori --</option>
                      @foreach($rs1 as $kat)
                      <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Jumlah</label>
                    <input type="text" name="jumlah" class="form-control"/>
                  </div>
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="text" name="harga" class="form-control"/>
                  </div>
                  <div class="form-group">
                    <label>Kondisi</label>
                    <input type="text" name="kondisi" class="form-control"/>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="proses">Submit</button>
                  <button type="reset" class="btn btn-warning" name="unproses">Batal</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop

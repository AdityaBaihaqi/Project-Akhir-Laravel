@extends('adminlte::page') 
@section('title','Form Kategori') 
@section('content_header')
    <h1>Form Kategori</h1>
@stop 
@section('content')

<!-- general form elements -->
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Kategori</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('kategori.store') }}" method="POST">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control"/>
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

@if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li> 
      @endforeach
      </ul>
  </div>
@endif

@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop

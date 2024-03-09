@extends('adminlte::page')
@section('title',
'Edit Inventaris')
@section('content_header')
<h1>Edit Inventaris</ h1>
@stop
@section('content')

@php
$rs1 = App\Models\Kategori::all();
@endphp
@foreach($data as $rs)
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data Inventaris</h3>
        </div>
        <form method="POST" action="{{ route('inventaris.update',$rs->id) }}">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" name="nama_barang" value="{{ $rs->nama_barang }}" class="form-control" id="nama_barang">
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="kategori_id">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($rs1 as $kat)
                        @php
                        $sel1 = ($kat->id == $rs->kategori_id) ? 'selected' : '';
                        @endphp
                        <option value="{{ $kat->id }}" {{ $sel1 }}>{{ $kat->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="text" name="jumlah" value="{{ $rs->jumlah }}" class="form-control" id="jumlah">
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" value="{{ $rs->harga }}" class="form-control" id="harga">
                </div>
                <div class="form-group">
                    <label for="kondisi">Kondisi</label>
                    <input type="text" name="kondisi" value="{{ $rs->kondisi }}" class="form-control" id="kondisi">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" name="proses" class="btn btn-primary">Ubah</button>
                <a href="{{ route('inventaris.index')}}" class="btn btn-success">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endforeach
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset ('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset ('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset ('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@stop
@section('js')
<!-- <script> console.log('Hi!'); </script> -->
<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
<!-- jQuery -->
<script src="{{ asset ('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset ('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset ('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset ('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset ('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset ('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset ('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset ('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset ('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset ('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset ('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset ('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset ('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset ('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset ('dist/js/demo.js')}}"></script>
@stop
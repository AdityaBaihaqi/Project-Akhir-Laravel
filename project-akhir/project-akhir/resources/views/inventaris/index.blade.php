@extends('adminlte::page') 
@section('title','Data Inventaris') 
@section('content_header')
    <h1>Data Inventaris</h1>
@stop 
@section('content')
@php
$ar_judul = ['No', 'Nama Barang', 'Kategori', 'Jumlah', 'Harga', 'Kondisi', 'Action'];
$no = 1;
@endphp

<div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Inventaris</h3>
                <br/><br/>
                <a class="btn btn-primary btn-md" href="{{ route('inventaris.create') }}" role="button">Tambah Inventaris</a>
                <a href="{{ url('inventarispdf') }}" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Unduh PDF </a>
                <a href="{{ url('inventariscsv') }}" class="btn btn-success"><i class="fas fa-file-excel"></i> Unduh Excel </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    @foreach($ar_judul as $jdl)
                        <th>{{ $jdl }}</th>
                    @endforeach
                  </tr>
                  </thead>
                  <tbody>
                        @foreach($ar_inventaris as $inv)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $inv->nama_barang }}</td>
                                <td>{{ $inv->kategori }}</td>
                                <td>{{ $inv->jumlah }}</td>
                                <td>{{ $inv->harga }}</td>
                                <td>{{ $inv->kondisi }}</td>
                                <td align="center">
                                  <form method="POST" action="{{ route('inventaris.destroy',$inv->id) }}">
                                  <!-- security untuk menghindari dari serangan pada saat input form -->
                                    @csrf
                                    @method('delete')
                                    <a class="btn btn-info" href="{{ route('inventaris.show',$inv->id) }}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-success" href="{{ route('inventaris.edit',$inv->id) }}"><i class="fa fa-pen"></i></a>
                                    <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data Dihapus?')"><i class="fa fa-trash"></i></button>
                                  </form>
                                </td>
                            </tr>
                        @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

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
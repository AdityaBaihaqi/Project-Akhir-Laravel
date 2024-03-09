@extends('adminlte::page')
@section('title',
'Edit Kategori')
@section('content_header')
<h1>Edit Kategori</ h1>
@stop
@section('content')

@foreach($data as $rs)
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data Kategori</h3>
        </div>
        <form method="POST" action="{{ route('kategori.update',$rs->id) }}">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" value="{{ $rs->nama }}" class="form-control" id="nama">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" name="proses" class="btn btn-primary">Ubah</button>
                <a href="{{ route('kategori.index')}}" class="btn btn-success">
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
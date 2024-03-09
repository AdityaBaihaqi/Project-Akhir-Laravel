@php
$ar_judul = ['No', 'Nama', 'Jumlah', 'Nama Barang', 'Kategori'];
$no = 1;
@endphp

<div class="card">
              <div class="card-header">
                <h2 class="card-title" align="center">Daftar Buku</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table border="1" width="100%" cellspacing="0" align="center">
                  <thead>
                  <tr bgcolor="gray">
                    @foreach($ar_judul as $jdl)
                        <th>{{ $jdl }}</th>
                    @endforeach
                  </tr>
                  </thead>
                  <tbody>
                        @foreach($ar_gedung as $ged)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $ged->nama }}</td>
                                <td>{{ $ged->jumlah }}</td>
                                <td>{{ $ged->inventaris }}</td>
                                <td>{{ $ged->kategori }}</td>
                            </tr>
                        @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
</div>

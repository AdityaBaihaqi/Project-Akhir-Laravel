@php
$ar_judul = ['No', 'Nama Barang', 'Kategori', 'Jumlah', 'Harga', 'Kondisi'];
$no = 1;
@endphp

<div class="card">
              <div class="card-header">
                <h2 class="card-title" align="center">Daftar Inventaris</h2>
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
                        @foreach($ar_inventaris as $inv)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $inv->nama_barang }}</td>
                                <td>{{ $inv->kategori }}</td>
                                <td>{{ $inv->jumlah }}</td>
                                <td>{{ $inv->harga }}</td>
                                <td>{{ $inv->kondisi }}</td>
                            </tr>
                        @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
</div>

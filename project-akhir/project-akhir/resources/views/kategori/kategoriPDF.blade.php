@php
$ar_judul = ['No', 'Nama'];
$no = 1;
@endphp

<div class="card">
              <div class="card-header">
                <h2 class="card-title" align="center">Daftar Kategori</h2>
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
                        @foreach($ar_kategori as $kat)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $kat->nama }}</td>
                            </tr>
                        @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
</div>

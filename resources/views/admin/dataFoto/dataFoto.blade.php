@extends('admin.mainn')

@section('content')
              <div class="card">
                <div class="card-header">
                  <h4>Table Data Foto</h4>
                  <div class="card-header-action">
                    <a href="/foto/tambahFoto" class="btn btn-danger">Tambah Foto <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>#</th>
                        <th>Judul Foto</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Unggah</th>
                        <th>Lokasi File</th>
                        <th>Album</th>
                        <th>Hapus</th>
                        <th>Edit</th>
                      </tr>
                      @foreach ($foto as $foto)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $foto->JudulFoto }}</td>
                          <td>{{ $foto->DeskripsiFoto }}</td>
                          <td>{{ $foto->TanggalUnggah }}</td>
                          <td>{{ $foto->LokasiFile }}</td>
                          <td>{{ $foto->NamaAlbum }}</td>
                          <td>
                            <form action="/dataFoto/{{$foto->FotoID}}" method="post">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Yakin akan dihapus?')">hapus</button>
                            </form>
                          </td>
                          <td>
                            <a href="/dataFoto/editFoto/{{$foto->FotoID}}">
                              <button class="badge bg-primary border-0">Edit</button>
                            </a>
                          </td>
                        </tr>
                      @endforeach
                      

                    </table>
                  </div>
                </div>

              
@endsection
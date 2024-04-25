@extends('admin.mainn')

@section('content')
              
           <form action="/album/tambahAlbum" method="post">
                @csrf
                <div class="card">
                  <div class="card-header">
                    <h4>Form Tambah Data Album</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Album</label>
                      <div class="col-sm-12 col-md-7">
                        <input name="NamaAlbum" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea name="Deskripsi" class="summernote"></textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Dibuat</label>
                      <div class="col-sm-12 col-md-7">
                        <input name="TanggalDibuat" type="date" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <a href="/dataAlbum">
                        <button type="submit" class="btn btn-primary">Publish</button></a>
                      </div>
                    </div>
                  </div>
                </div>

                </div>

                </form> 

              
@endsection
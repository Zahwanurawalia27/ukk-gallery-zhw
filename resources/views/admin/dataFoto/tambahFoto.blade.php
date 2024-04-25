@extends('admin.mainn')

@section('content')
              
                  
                <div class="card">
                  <div class="card-header">
                    <h4>Form Tambah Foto</h4>
                  </div>

                  <form action="/foto/tambahFoto" method="post" enctype="multipart/form-data" data-parsley-validate="">
                  @csrf
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul Foto</label>
                      <div class="col-sm-12 col-md-7">
                        <input name="JudulFoto" type="text" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi Foto</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea name="DeskripsiFoto" class="summernote"></textarea>
                        <script>
                            $(document).ready(function() {
                                $('.summernote-simple').summernote();
                            });
                        </script>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Unggah</label>
                      <div class="col-sm-12 col-md-7">
                        <input name="TanggalUnggah" type="date" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi File</label>
                      <div class="col-sm-12 col-md-7">
                        <input name="LokasiFile" type="file" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilih Album / Category</label>
                      <div class="col-sm-12 col-md-7">
                        <select name="AlbumID" id="AlbumID" class="form-control selectric" required >
                          <option value="">Pilih Album</option>
                          @foreach ($album as $category)
                            <option value="{{$category->AlbumID}}"> {{ $category->NamaAlbum }} </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                      <a href="/dataFoto">
                        <button type="submit" class="btn btn-primary">Publish</button></a>
                      </div>
                    </div>
                  </div>
                  </form>
                </div>

                </div>

              
@endsection
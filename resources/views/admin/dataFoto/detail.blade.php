
@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card mt-5">
                    <img class="card-img-top" src="{{ asset('storage/images/photo-images/' . $foto->LokasiFile) }}" alt="Foto" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $foto->JudulFoto }}</h5>
                        <p class="card-text">Deskripsi : {{ $foto->DeskripsiFoto }}</p>
                        <p class="card-text">Pengunggah : {{ $foto->NamaLengkap}}</p>
                        <p class="card-text">Album : {{ $foto->album->NamaAlbum }}</p>
                        <p class="card-text">Jumlah Like : {{ $foto->likesCount() }}</p>
                        <p class="card-text">Jumlah Komentar : {{ $foto->komentarsCount() }}</p>

                        <!-- Form untuk menambahkan komentar baru -->
                        <form action="{{ route('foto.comment', $foto->FotoID) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="IsiKomentar">Tambahkan Komentar :</label>
                                <textarea class="form-control" id="IsiKomentar" name="IsiKomentar" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-secondary">Kirim Komentar</button>
                        </form>
                        <br>
                        <br>
                        <br>
    
                        <!-- Tampilkan komentar -->
                        <div class="komentar">
                            <h4>Komentar Foto</h4>
                            <br>
                            @foreach ($komentar as $komen)
                                <div class="card">
                                    <div class="card-body">
                                      <p>Oleh : ( {{ $komen->user->NamaLengkap }}  )</p> 
                                      <p>{{ $komen->IsiKomentar }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('admin.mainn')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Foto</h4>
    </div>
    <div class="card-body">
        <form action="/dataFoto/update/{{$foto->FotoID}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="JudulFoto">Judul Foto</label>
                <input type="text" name="JudulFoto" id="JudulFoto" class="form-control" value="{{$foto->JudulFoto}}">
            </div>
            <div class="form-group">
                <label for="DeskripsiFoto">Deskripsi</label>
                <textarea name="DeskripsiFoto" id="DeskripsiFoto" class="form-control">{{$foto->DeskripsiFoto}}</textarea>
            </div>
            <div class="form-group">
                <label for="TanggalUnggah">Tanggal Unggah</label>
                <input type="date" name="TanggalUnggah" id="TanggalUnggah" class="form-control" value="{{$foto->TanggalUnggah}}">
            </div>
            <div class="form-group">
                <label for="AlbumID">Album</label>
                <select name="AlbumID" id="AlbumID" class="form-control">
                    @foreach($albums as $album)
                        <option value="{{$album->AlbumID}}" {{$foto->AlbumID == $album->AlbumID ? 'selected' : ''}}>{{$album->NamaAlbum}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
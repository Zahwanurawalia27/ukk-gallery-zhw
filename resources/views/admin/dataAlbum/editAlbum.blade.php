@extends('admin.mainn')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Foto</h4>
    </div>
    <div class="card-body">
        <form action="/dataAlbum/update/{{$album->AlbumID}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="NamaAlbum">Nama Album</label>
                <input type="text" name="NamaAlbum" id="NamaAlbum" class="form-control" value="{{$album->NamaAlbum}}">
            </div>
            <div class="form-group">
                <label for="Deskripsi">Deskripsi</label>
                <textarea name="Deskripsi" id="Deskripsi" class="form-control">{{$album->Deskripsi}}</textarea>
            </div>
            <div class="form-group">
                <label for="TanggalDibuat">Tanggal Dibuat</label>
                <input type="date" name="TanggalDibuat" id="TanggalDibuat" class="form-control" value="{{$album->TanggalDibuat}}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
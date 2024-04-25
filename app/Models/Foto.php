<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'fotos';
    protected $primaryKey = 'FotoID';

    protected $guarded = ['FotoID'];

    protected $fillable = ['JudulFoto', 'DeskripsiFoto', 'TanggalUnggah', 'LokasiFile', 'AlbumID', 'UserID'];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function album()
    {
        return $this->belongsTo(Album::class, 'AlbumID', 'AlbumID');
    }

    public function likefotos()
    {
        return $this->hasMany(LikeFoto::class, 'FotoID');
    }

    public function likedByUser($userId)
    {
        return $this->likefotos()->where('UserID', $userId)->exists();
    }

    public function likesCount()
    {
        return $this->likefotos()->count();
    }

    public function komentars()
    {
        return $this->hasMany(KomentarFoto::class, 'FotoID');
    }

    public function komentarsCount()
    {
        return $this->komentars()->count();
    }
}

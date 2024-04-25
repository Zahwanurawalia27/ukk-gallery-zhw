<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'albums';
    protected $primaryKey = 'AlbumID';
    protected $guarded = ['AlbumID']; 

    protected $fillable = ['NamaAlbum', 'Deskripsi', 'TanggalDibuat', 'UserID'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function foto()
    {
        return $this->hasMany(Foto::class);
    }
}

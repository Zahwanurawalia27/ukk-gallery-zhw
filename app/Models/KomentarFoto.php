<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarFoto extends Model
{
    use HasFactory;

    protected $table = 'komentarfotos';
    protected $primaryKey = 'KomentarID';

    protected $guarded = ['KomentarID'];
    protected $fillable = ['FotoID', 'UserID', 'IsiKomentar', 'TanggalKomentar'];

    public function foto()
    {
        return $this->belongsTo(Foto::class, 'FotoID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeFoto extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'likefotos';
    protected $primaryKey = 'LikeID';

    protected $guarded = ['LikeID'];

    protected $fillable = ['FotoID', 'UserID', 'TanggalLike'];

}

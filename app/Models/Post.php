<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'tieu_de',
        'tac_gia',
        'mo_ta',
        'anh_bai_viet',
    ];
}

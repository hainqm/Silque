<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    use HasFactory;
    protected $table = 'banners';
    protected $fillable = [
        'tieu_de',
        'mo_ta',
        'duong_dan_anh',
        'trang_thai',
    ];
}

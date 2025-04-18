<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = [
        'ten_nguoi_dung',
        'ten_san_pham',
        'so_sao',
        'noi_dung_danh_gia',
    ];

    // public function product()
    // {
    //     return $this->belongsTo(Product::class);
    // }
}
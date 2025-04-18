<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $dates = ['deleted_at']; // Không bắt buộc, Laravel tự động xử lý

    protected $fillable = [
        'ma_san_pham',
        'ten_san_pham',
        'category_id',
        'gia',
        'gia_khuyen_mai',
        'anh',
        'so_luong',
        'ngay_nhap',
        'mo_ta',
        'trang_thai'
    ];


    //Tạo mối quan hệ với bảng Categories
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    //tạo mối quan hệ với bảng review
    // public function reviews()
    // {
    //     return $this->hasMany(Review::class, 'product_id');
    // }
}

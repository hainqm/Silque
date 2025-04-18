<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'ten_khach_hang',
        'tuoi',
        'email',
        'dia_chi',
        'gioi_tinh',
    ];
}

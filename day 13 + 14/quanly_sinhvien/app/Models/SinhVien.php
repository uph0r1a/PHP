<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    protected $fillable = [
        'ma_sv',
        'ho_ten',
        'tuoi',
        'email',
        'lop',
        'diem_tb',
        'trang_thai'
    ];
}

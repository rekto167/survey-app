<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_instansi',
        'alamat_instansi',
        'logo_kiri',
        'logo_kanan',
        'emot_1',
        'emot_2',
        'emot_3',
        'emot_4',
        'emot_5',
        'banner_static',
        'running_text'
    ];
}

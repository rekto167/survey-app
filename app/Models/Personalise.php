<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personalise extends Model
{
    use HasFactory;
    protected $fillable = [
        'warna_banner_atas',
        'warna_background',
        'warna_banner_runningtext'
    ];
}

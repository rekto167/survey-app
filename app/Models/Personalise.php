<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personalise extends Model
{
    use HasFactory;
    protected $fillable = [
        'warna-banner-atas',
        'warna-background',
        'warna-banner-runningtext'
    ];
}

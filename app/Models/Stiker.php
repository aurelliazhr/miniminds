<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stiker extends Model
{
    use HasFactory;

    protected $fillable = [
    ];

    protected $guarded = [
        'kategori',
        'stiker',
    ];
}

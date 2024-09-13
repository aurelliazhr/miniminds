<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stiker extends Model
{
    use HasFactory;

    protected $table = 'stiker';
    protected $fillable = ['id', 'kategori', 'stiker', 'user_id'];

    protected $guarded = [
        'kategori',
        'stiker',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

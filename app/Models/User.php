<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // Atribut yang dapat diisi massal saat create
    protected $fillable = [
        'fullname',
        'kelas',
    ];

    // Atribut yang dapat diisi massal saat update
    protected $updateable = [
        'catatan',
    ];

    // Relasi dengan Stiker
    public function stiker()
    {
        return $this->belongsTo(Stiker::class);
    }

    // Mengisi kolom catatan pada update
    public function updateCatatan(array $attributes)
    {
        $this->update($attributes);
    }
}

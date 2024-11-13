<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Pastikan ini adalah superclass yang di-extend
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable // Meng-extend Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    // Atribut yang dapat diisi massal saat create
    protected $fillable = [
        'image',
        'fullname',
        'password',
        'catatan',
        'kelas',
        'role',
    ];

    use Notifiable;
    public function stikers()
    {
        return $this->hasMany(Stiker::class, 'user_id');
    }
}

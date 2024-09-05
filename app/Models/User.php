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
        'fullname',
        'password',
        'kelas',
        'role',
    ];

    // public function getAuthPassword()
    // {
    //     return $this->kelas; // Mengembalikan nilai kelas sebagai password
    // }

    // Jika Anda perlu menambahkan kolom 'catatan' secara dinamis, lakukan dengan cara yang benar.
    // protected $fillable = ['fullname', 'kelas', 'catatan'];

    // Jika Anda memerlukan hubungan dengan Stiker, pastikan Anda mendefinisikan model Stiker dengan benar.
    // public function stiker()
    // {
    //     return $this->belongsToMany(Stiker::class);
    // }

    // Fungsi untuk mengisi kolom catatan saat update
    // public function updateCatatan(array $attributes)
    // {
    //     $this->update($attributes);
    // }
}

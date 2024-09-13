<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Stiker;
use App\Models\User;

class StikerController extends Controller
{
    public function storeStiker(Request $request)
    {
        $user = Auth::user(); // Mendapatkan user yang sedang login
        $kategori = $request->kategori;

        // Mendapatkan file gambar stiker dari kategori
        $stikerFile = $this->getStikerFile($kategori);

        // Mengecek apakah stiker dengan kategori ini sudah ada untuk user ini
        $existingStiker = Stiker::where('user_id', $user->id)->where('kategori', $kategori)->first();

        if (!$existingStiker) {
            // Menyimpan stiker baru ke database
            Stiker::create([
                'user_id' => $user->id, // Gunakan id, bukan user_id
                'kategori' => $kategori,
                'stiker' => $stikerFile, // Ini adalah data binary dari gambar
            ]);

            return response()->json(['success' => true, 'message' => 'Stiker berhasil disimpan']);
        }

        // Jika user sudah memiliki stiker ini, berikan respon gagal
        return response()->json(['success' => false, 'message' => 'User sudah memiliki stiker ini']);
    }

    // Mendapatkan konten file stiker berdasarkan kategori
    private function getStikerFile($kategori)
    {
        $filePath = public_path("stiker/{$kategori}.jpg"); // Mengambil path file stiker

        // Mengecek apakah file stiker ada
        if (file_exists($filePath)) {
            return file_get_contents($filePath); // Mengembalikan konten file dalam bentuk binary
        }

        // Jika file tidak ditemukan, kembalikan error atau handle secara lebih baik
        abort(404, 'Stiker tidak ditemukan');
    }
}

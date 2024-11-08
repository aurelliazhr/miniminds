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
        $request->validate([
            'kategori' => 'required|string',
            'stiker' => 'required|string',
        ]);

        $user = Auth::user();
        $kategori = $request->input('kategori');
        $stikerData = $request->input('stiker');

        $stikerFile = base64_decode($stikerData);
        if ($stikerFile === false){
            throw new \Exception('gagal decode data base64');
        }

        $existingStiker = Stiker::where('user_id', $user->id)
                                ->where('kategori', $kategori)
                                ->first();
                                
        if (!$existingStiker){
            Stiker::create([
                'user_id' => $user->id,
                'kategori' => $kategori,
                'stiker' => $stikerFile,
            ]);
            return response()->json(['success' => true, 'message' => 'stiker berhasil dikirim']);
        }

        return response()->json(['success' => false, 'message' => 'user telah memiliki stiker ini']);
    }

    // Mendapatkan konten file stiker berdasarkan kategori
    private function getStikerFile($kategori)
    {
        $filePath = public_path("stiker/{$kategori}.png"); // Mengambil path file stiker

        // Mengecek apakah file stiker ada
        if (file_exists($filePath)) {
            return file_get_contents($filePath); // Mengembalikan konten file dalam bentuk binary
        }

        // Jika file tidak ditemukan, kembalikan error atau handle secara lebih baik
        abort(404, 'Stiker tidak ditemukan');
    }
}

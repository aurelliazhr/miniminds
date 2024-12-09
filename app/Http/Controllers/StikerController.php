<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Stiker;
Use App\Models\User;


class StikerController extends Controller
{
    public function storeStiker(Request $request)
    {        
        $user = Auth::user();
        $kategori = $request->kategori;

        $stikerFile = $this->getStikerFile($kategori);

        $existingStiker = Stiker::where('user_id', $user->id)->where('kategori', $kategori)->first();

        if (!$existingStiker){
            Stiker::create([
                'user_id' => $user->id,
                'kategori' => $kategori,
                'stiker' => $stikerFile,
            ]);
            return response()->json(['success' => true, 'message' => 'stiker berhasil disimpan']);
        }
        return response()->json(['success' => false, 'message' => 'user telah memiliki stiker ini']);
    }

    // Mendapatkan konten file stiker berdasarkan kategori
    private function getStikerFile($kategori)
    {
        $filePath = public_path("stiker/{$kategori}.jpg"); // Mengambil path file stiker

        // Mengecek apakah file stiker ada
        if (file_exists($filePath)){
            return file_get_contents($filePath);
        }

        // Jika file tidak ditemukan, kembalikan error atau handle secara lebih baik
        abort(404, 'Stiker tidak ditemukan');
    }

    public function data()
    {
        $data = User::with('stikers')->get();

        return view('data', compact('data'));
    }
}

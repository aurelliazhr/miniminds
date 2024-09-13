<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stiker;

class BintangController extends Controller
{
    public function index()
    {
        return view('test');
    }

    public function storeStiker(Request $request)
    {
        $kategori = $request->input('kategori');
        $score = $request->input('score');
        $bintang = floor($score/ 10);

        if ($bintang == 5) {
            $stiker = Stiker::where('kategori', $kategori)->first();
            if (!$stiker){
                $filePath = storage_path('app/public/stiker/' . $kategori . '.jpg');
                $fileContent = file_get_contents($filePath);

                Stiker::create([
                    'kategori' => $kategori,
                    'stiker' => $fileContent,
                ]);
            }
        }

        return response()->json(['success' => true]);
    }
}

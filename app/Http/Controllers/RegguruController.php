<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class RegguruController extends Controller
{
    public function regguru()
    {
        return view('regguru');
    }

    public function regguru_proses (Request $request)
    {
        $request->validate([
            'fullname' => 'required|unique:guru,fullname',
            'kelas' => 'required'
        ]);

        $data['fullname'] = $request->fullname;
        $data['kelas'] = $request->kelas;

        Guru::create($data);
    }

    public function kode()
    {
        return view('kode');
    }
}

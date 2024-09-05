<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegguruController extends Controller
{
    public function regguru()
    {
        return view('regguru');
    }

    public function regguru_proses (Request $request)
    {
        $request->validate([
            'fullname' => 'required|unique:users,fullname',
            'password' => 'required',
            'kelas' => 'required',
        ]);

        $data['fullname'] = $request->fullname;
        $data['password'] = Hash::make($request->password);
        $data['kelas'] = $request->kelas;
        $data['role'] = 'guru';

        User::create($data);
    }

    public function kode()
    {
        return view('kode');
    }
}

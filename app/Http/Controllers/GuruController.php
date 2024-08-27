<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function guru()
    {
        return view ('guru');
    }

    public function menambah_proses (Request $request)
    {
        $request->validate([
            'fullname' => 'required|unique:users,fullname',
            'kelas' => 'required'
        ]);

        $data['fullname'] = $request->fullname;
        $data['kelas'] = $request->kelas;

        User::create($data);
    }

    public function menambah()
    {
        return view ('menambah');
    }

    public function melihat()
    {
        return view ('melihat');
    }

    public function data()
    {
        return view ('data');
    }

    public function catatan()
    {
        return view ('catatan');
    }
}

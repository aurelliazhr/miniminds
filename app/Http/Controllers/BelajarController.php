<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BelajarController extends Controller
{
    public function huruf()
    {
        return view ('Huruf.abjadA');
    }

    public function angka()
    {
        return view ('angka');
    }

    public function hijaiyah()
    {
        return view ('hijaiyah');
    }
}

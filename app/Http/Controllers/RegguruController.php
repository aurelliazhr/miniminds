<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegguruController extends Controller
{
    public function regguru()
    {
        return view('regguru');
    }

    public function kode()
    {
        return view('kode');
    }
}

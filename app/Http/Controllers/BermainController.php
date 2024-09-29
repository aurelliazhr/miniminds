<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BermainController extends Controller
{
    public function menebakH()
    {
        return view ('menebakH');
    }

    public function menebakA()
    {
        return view ('menebakA');
    }

    public function menebakHi()
    {
        return view ('menebakHi');
    }

    public function menebak()
    {
        return view ('menebak');
    }

    public function aktivitas()
    {
        return view ('aktivitas');
    }

    public function eksplor()
    {
        return view ('Eksplorasi.eksplorasi');
    }
}

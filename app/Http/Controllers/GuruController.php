<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function guru()
    {
        return view ('guru');
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

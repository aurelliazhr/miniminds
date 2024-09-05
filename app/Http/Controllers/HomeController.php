<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        if (!session('login')) {
            return redirect()->route('login'); 
        }
        
        return view('home');
    }

    public function profil()
    {
        return view('profil');
    }

    public function belajar()
    {
        return view('belajar');
    }

    public function bermain()
    {
        return view('bermain');
    }
}

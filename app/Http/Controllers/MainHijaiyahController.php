<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainHijaiyahController extends Controller
{
    public function hijaiyah1() {
        return view('MainHijaiyah.maindal');
    }

    public function hijaiyah2() {
        return view('MainHijaiyah.maindhad');
    }

    public function hijaiyah3() {
        return view('MainHijaiyah.mainkaf');
    }

    public function hijaiyah4() {
        return view('MainHijaiyah.mainkha');
    }

    public function hijaiyah5() {
        return view('MainHijaiyah.mainlam');
    }

    public function hijaiyah6() {
        return view('MainHijaiyah.mainmim');
    }

    public function hijaiyah7() {
        return view('MainHijaiyah.mainra');
    }

    public function hijaiyah8() {
        return view('MainHijaiyah.mainsin');
    }

    public function hijaiyah9() {
        return view('MainHijaiyah.mainta');
    }

    public function hijaiyah10() {
        return view('MainHijaiyah.mainwaw');
    }

    public function resultHi() {
        return view('MainHijaiyah.resultHi');
    }
}

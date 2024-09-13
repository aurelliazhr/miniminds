<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Stiker;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $stikers = $user->stikers;

        return view('home', compact('stikers'));
    }
}

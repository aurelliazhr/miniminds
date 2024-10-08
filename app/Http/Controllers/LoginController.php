<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function login()
    {
        if (Cookie::has('key')) {
            $key = Cookie::get('key'); // Nilai Cookie

            // Nama User
            $user = Auth::user();

            if ($user && hash('sha256', $user->fullname) === $key) {
                // Session
                session(['login' => true]);
            }
        }

        if (session('login')) {
            return redirect()->route('home');
        }

        return view('login');
    }

    public function login_proses(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        // $request->validate([
            $credentials = $request->validate ([
            'fullname' => 'required',
            'password' => 'required',
            'kelas' => 'required'
        ] , [
            'fullname.required' => 'Nama Harus Diisi',
            'password' => 'Nomor Absen Harus Diisi',
            'kelas' => 'Kelas Harus Diisi',
        ]);

        $data = [
            'fullname' => $request->fullname,
            'password' => $request->password,
            'kelas' => $request->kelas
        ];

        // if (Auth::attempt($data)) {

        if(Auth::attempt($credentials)) {
                    $request->session()->regenerate();
            // Session
            session(['login' => true]);

            // Cookie
            if ($request->has('remember')) {
                $minutes = 43200;
                Cookie::queue('key', hash('sha256', $data['fullname']), $minutes);
            }

            return redirect()->route('home');
        } else {
            return redirect()->route('login')->withInput()->with('failed', 'Nama, Nomor Absen, atau Kelas Salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();

        Cookie::queue(Cookie::forget('key'));

        return redirect()->route('login');
    }
}

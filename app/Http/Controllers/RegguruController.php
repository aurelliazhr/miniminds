<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegguruController extends Controller
{
    public function regguru()
    {
        return view('regguru');
    }

    public function regguru_proses(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'fullname' => 'required|unique:users,fullname',
            'password' => 'required',
            'kelas' => 'required',
        ] , [
            'image.required' => 'Gambar harus diisi (png, jpg, jpeg)',
            'fullname.required' => 'Nama harus diisi',
            'fullname.unique' => 'Nama sudah digunakan (silahkan pilih nama lain)',
            'password.required' => 'Nomor Absen harus diisi',
            'kelas.required' => 'Pilih Kelas',
        ]);

        $image = $request->file('image');
        $filename = date('Y-m-d').$image->getClientOriginalName();
        $path = 'foto-user/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($image));
        
        $data['image'] = $filename;
        $data['fullname'] = $request->fullname;
        $data['password'] = Hash::make($request->password);
        $data['kelas'] = $request->kelas;
        $data['role'] = 'guru';

        User::create($data);
        return redirect()->back()->with('success', 'Data Anda Berhasil Ditambahkan');
        // return redirect()->route('login');
        // return redirect()->route('login')->withInput()->withFlashMessage('success', 'Data Anda berhasil ditambahkan!');
    }

    public function kode()
    {
        return view('kode');
    }
}

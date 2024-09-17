<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    public function guru()
    {
        if (!session('login')) {
            return redirect()->route('login'); 
        }

        return view ('guru');
    }

    public function menambah_proses (Request $request)
    {
        // dd($request->all());

        $request->validate([
            'fullname' => 'required|unique:users,fullname',
            'password' => 'required',
            'kelas' => 'required',
        ]);

        $data['fullname'] = $request->fullname;
        $data['password'] = Hash::make($request->password);
        $data['kelas'] = $request->kelas;
        $data['role'] = 'murid';

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

    public function melihat_proses (Request $request)
    {
        $kelas = $request->kelas;

        // Simpan nilai kelas ke dalam session
        Session::put('kelas', $kelas);
        return redirect()->route('data');
    }

    public function data()
    {
        // Ambil nilai kelas dari session
        $kelas = Session::get('kelas');

        // Ambil data murid berdasarkan kelas yang dipilih
        $data = User::where('kelas', $kelas)
        ->where('role', 'murid')
        ->get();

        // Kembalikan view dengan data murid yang sesuai
        return view('data', compact('data'));
    }

    public function catatan (Request $request, $id)
    {
        $data = User::find($id);

        return view ('catatan', compact('data'));
    }

    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(),[
            'catatan' => 'required'
        ]);

        // if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422); // 422 Unprocessable Entity
        }

        $data['catatan'] = $request->catatan;

        User::whereId($id)->update($data);
    }
}

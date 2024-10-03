<?php

namespace App\Http\Controllers;

use App\Models\Stiker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
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
        $kelas = $request->input('kelas');

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

        $user = Auth::user();
        $stikers = Stiker::where('user_id', $user->id)->get();

        // Kembalikan view dengan data murid yang sesuai
        return view('data', compact('data', 'stikers'));
    }

    public function catatan (Request $request, $id)
    {
        $data = User::find($id);

        return view ('catatan', compact('data'));
    }

    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(),[
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'fullname' => 'required',
            'password' => 'nullable',
            'kelas' => 'required',
            'catatan' => 'nullable'
        ] , [
            'image.required' => 'Gambar harus diisi (png, jpg, jpeg)',
            'fullname.required' => 'Nama harus diisi',
            'fullname.unique' => 'Nama sudah digunakan (silahkan pilih nama lain)',
            'kelas.required' => 'Kelas Harus Diisi',

        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'errors' => $validator->errors()
        //     ], 422); // 422 Unprocessable Entity
        // }

        $user = User::find($id);

        $image = $request->file('image');

        if ($image) {
            $filename = date('Y-m-d').$image->getClientOriginalName();
        $path = 'foto-user/'.$filename;

        if($request->hasFile('image')) {
            Storage::disk('public')->delete('foto-user/' . $user->image);
        }

        Storage::disk('public')->put($path,file_get_contents($image));

        $data['image'] = $filename;
        }

        $data['fullname'] = $request->fullname;

        if($request->password) {
            $data['password'] = Hash::make($request->password);
        }
    
        $data['kelas'] = $request->kelas;
        $data['catatan'] = $request->catatan;

        // User::whereId($id)->update($data);

        // $find->edit_proses($data);
        User::whereId($id)->update($data);

        return redirect()->route('data');
    }

    public function delete(Request $request, $id) {
        $data = User::find($id);

        if($data) {
            $data->delete();
        }

        return redirect()->route('data');
    }
}

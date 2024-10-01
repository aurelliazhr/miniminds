<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EditController extends Controller
{
    public function edit(Request $request, $id)
    {
        $data = User::find($id);

        return view ('edit', compact('data'));
    }

    public function edit_proses (Request $request, $id) {

        $validator = Validator::make($request->all(),[
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'fullname' => 'nullable|unique:users,fullname',
            'password' => 'nullable',
            'kelas' => 'required',
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

        // User::whereId($id)->update($data);

        // $find->edit_proses($data);
        User::whereId($id)->update($data);

        return redirect()->route('home');
    }
}

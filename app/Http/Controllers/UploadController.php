<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{
    public function upload(Request $request, $id)
    {
        $data = User::find($id);

        return view ('upload', compact('data'));
    }

    public function upload_proses (Request $request, $id) {

        $validator = Validator::make($request->all(),[
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ] , [
            'image.required' => 'Gambar harus diisi (png, jpg, jpeg)',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'errors' => $validator->errors()
        //     ], 422); // 422 Unprocessable Entity
        // }

        $user = User::find($id);

        $image = $request->file('image');

        $data = [];

        if ($image) {
            $filename = date('Y-m-d').$image->getClientOriginalName();
        $path = 'foto-user/'.$filename;

        if($request->hasFile('image')) {
            Storage::disk('public')->delete('foto-user/' . $user->image);
        }

        Storage::disk('public')->put($path,file_get_contents($image));

        $data['image'] = $filename;
        }

        // User::whereId($id)->update($data);

        // $find->edit_proses($data);
        User::whereId($id)->update($data);

        return redirect()->route('home');
    }
}

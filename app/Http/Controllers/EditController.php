<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
            'image' => 'required',
            'fullname' => 'required',
            'password' => 'required',
            'kelas' => 'required'
        ]);

        // if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422); // 422 Unprocessable Entity
        }

        $data['image'] = $request->image;
        $data['fullname'] = $request->fullname;
        $data['password'] = $request->password;
        $data['kelas'] = $request->kelas;

        User::whereId($id)->update($data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.index',
        [
            'title' => 'Edit Profile',
            'alamats' => Alamat::where('id_user', Auth::user()->id)->get(),
        ]);
    }

    public function update(Request $request)
    {
        $validateData = $request->validate([
            'image' => 'image|file|max:1024',
            'name' => 'required',
            'tgl_lahir' => 'nullable|date',
            'jk' => 'max:1',
            'no_hp' => 'nullable',
            'email' => 'required|email'
        ]);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('profile-images');
        }

        User::where('id', Auth::user()->id)->update($validateData);
        return redirect('/editProfile')->with('succesUbahProfile', 'Profile berhasil diubah');
    }
}
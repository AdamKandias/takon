<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function createPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6',
            'password_confirm' => 'required|same:password',
        ]);

        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('profile')->with("status", "Pasword berhasil dibuat!");
    }

    public function editPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|current_password',
            'new_password' => 'required|min:6',
            'password_confirm' => 'required|same:new_password',
        ]);

        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile')->with("status", "Pasword berhasil diubah!");
    }

    public function editImage(Request $request)
    {
        $request->validateWithBag('editImage', [
            'image' => 'required|image|max:1024',
        ]);

        if ($request->file('image')->isValid()) {
            $user = User::find(Auth::user()->id);
            if (!Str::contains($user->image, 'avatar')) {
                Storage::delete($user->image);
            }
            $user->image = $request->file('image')->store('user-image');
            $user->save();
        }

        return redirect()->route('profile')->with("status", "Foto profil berhasil diubah!");
    }

    public function dashboard()
    {
        return view("admin.dashboard");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view("user.login");
    }

    public function auth(Request $request)
    {
        $request->validate([
            'nisn' => 'required|size:10',
        ]);

        $user = User::where("nisn", $request->nisn)->where("birthdate", implode('-', array_reverse(explode('-', $request->birthdate))))->first();

        if (!empty($user)) {
            if ($user->password != null) {
                if ($request->password != null) {
                    if (password_verify($request->password, $user->password)) {
                        if (Auth::loginUsingId($user->id)) {
                            $request->session()->regenerate();

                            if ($user->status_id == 2) {
                                return redirect()->intended('dashboard');
                            }

                            return redirect()->intended('home');
                        }
                    } else {
                        return redirect()->back()->withInput()->with("status", "Data yang diinputkan tidak ada atau salah, harap mengisi dengan benar!");
                    }
                } else {
                    return redirect()->back()->withInput()->with("status", "Harap masukkan password!");
                }
            } else {
                if (Auth::loginUsingId($user->id)) {
                    $request->session()->regenerate();

                    return redirect()->intended('home');
                }
            }
        } else {
            return redirect()->back()->withInput()->with("status", "Data yang diinputkan tidak ada atau salah, harap mengisi dengan benar!");
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route("login");
    }
}

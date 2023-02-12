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
            'nisn' => 'required|max:10',
        ]);

        $user = User::where("nisn", $request->nisn)->where("birthdate", implode('-', array_reverse(explode('-', $request->birthdate))))->first();

        if (!empty($user)) {
            if (Auth::loginUsingId($user->id)) {
                $request->session()->regenerate();

                return redirect()->intended('home');
            }
        }

        return redirect()->route("login")->with("status", "Incorrect data entry! Please fill the field correctly!");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route("home");
    }
}

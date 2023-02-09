<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view("user.login");
    }

    public function index()
    {
        return view("post.home");
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'nisn' => 'required|max:10',
            'birthdate' => 'required'
        ]);

        $user = User::where("nisn", (string) $credentials["nisn"])->where("birthdate", (string) ($credentials["birthdate"]))->first();

        if (!empty($user)) {
            if (Auth::loginUsingId($user->id)) {
                $request->session()->regenerate();
                
                return redirect()->intended('home');
            }
        }

        return redirect("/login")->with("status", "Nisn atau tanggal lahir salah!");
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}

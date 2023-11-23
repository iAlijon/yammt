<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class AuthController extends Controller
{
    use HasRoles;
    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'userActive');
    }

    public function showLoginForm()
    {
        return view('auth.loginForm');
    }

    public function login(){
            $credentials = request(['name', 'password']);
            if( Auth::guard('web')->attempt($credentials) ){
                $user = Auth::guard('web')->user();

                if ($user->roles->pluck('name')) {
                    Auth::shouldUse('web');
                    return redirect()->route('dashboard');
                } else {
                    Auth::guard('web')->logout();
                    return redirect()->back()->withErrors(['status' => 'Ushbu dasturga kirishga ruxsat berilmagan']);
                }
            } else {
                return redirect()->back()->withErrors(['status' => 'Login yoki parolni kiritishda xatolik!']);
            }
    }

    public function logout()
    {
         Auth::guard('web')->logout();
         return redirect()->route('home');
    }
}

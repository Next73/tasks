<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required|string',
            'password' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        $login = $request->input('login');
        $password = $request->input('password');
    
        if (!User::where('login', $login)->exists()) {
            return redirect()->back()->withErrors(['login' => 'Пользователь с таким логином не существует'])->withInput();
        }
    
        $credentials = $request->only('login', 'password');
    
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/login');
        }
    
        return redirect()->back()->withErrors(['login' => 'Неправильный логин или пароль.'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('home');
    }
}

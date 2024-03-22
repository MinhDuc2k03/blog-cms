<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{


    
    public function login() {
        if(!session()->has('url.intended') && url()->previous() != route('logout'))
        {
            session(['url.intended' => url()->previous()]);
        } else {
            session(['url.intended' => route('home')]);
        }
        
        if (Auth::check()) {
            return redirect()->intended(route('home'));
        }
        return view('login');
    }



    public function loginPost(Request $request) {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            if (parse_url(session()->get('url.intended'), PHP_URL_PATH) == '/admin/posts' && Auth::user()->role != 1) {
                return redirect(route('home'));
            }
            return redirect(session()->get('url.intended'));
        }
        return redirect(route('login'))->with('error', 'Wrong email or password. Try again.');
    }



    public function register() {
        if (Auth::check()) {
            return redirect(route('home'));
        }
        return view('register');
    }



    public function registerPost(Request $request) {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'same:password_confirmation'],
            'password_confirmation' => ['required'],
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        if (!$user) {
            return redirect(route('register'))->with('error', 'Wrong email or password. Try again.');
        }
        return redirect(route('login'))->with('success', 'Registeration success.');
    }

    

    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}

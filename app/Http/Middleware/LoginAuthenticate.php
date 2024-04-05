<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginAuthenticate
{
    public function handle(Request $request, Closure $next): Response
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::check() && (Auth::user()->role == 1 || Auth::user()->role == 2)) {
                return redirect()->intended();
            } elseif (Auth::check() && Auth::user()->role == 0) {
                return $next($request);
            }
        }
        return redirect(route('login'))->with('error', 'Wrong email or password. Try again.');
    }
}

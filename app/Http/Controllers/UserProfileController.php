<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserProfileController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'same:password_confirmation'],
            'password_confirmation' => ['required'],
        ]);
        
        $data['name'] = Str::slug($request->name, '_');
        $data['display_name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['role'] = $request->role;

        $user = User::create($data);

        if (Auth::user()->role != 0) {
            return redirect(route('admin.user.showAll'))->with('message', 'User successfully created');
        }
    }

    public function adminUpdateUser(Request $request, string $id)
    {
        $user = User::where('id', $id);
        $user->update([
            'display_name' => $request->display_name,
            'role' => $request->role,
        ]);

        $users = User::all();
        return redirect()->route('admin.user.showAll')->with(['users' => $users]);
    }

    public function userShow(string $id)
    {
        $user = User::find($id);
        return view('user.show')->with(['user' => $user]);
    }
}

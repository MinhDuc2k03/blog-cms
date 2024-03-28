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

class UserController extends Controller
{
    public function store(Request $request) {
        

        if (Auth::user()->role == 1) {
            return redirect(route('admin.user.showAll'))->with('message', 'User successfully created');
        }
    }

    public function adminUpdateUser(Request $request, string $id)
    {
        $user = User::where('id', $id);
        $user->update([
            'display_name' => $request->input('display_name'),
        ]);

        $users = User::all();
        return redirect()->route('admin.user.showAll')->with(['users' => $users]);
    }

    // public function destroyUser(string $id)
    // {
    //     User::find($id)->delete();
    //     $users = User::all();
    //     return redirect()->route('admin.user.showAll')->with(['users' => $users]);
    // }

    public function userShow(string $id)
    {
        $user = User::find($id);
        return view('user.show')->with(['user' => $user]);
    }
}

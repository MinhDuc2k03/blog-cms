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
        $slug = '';
        if($request->filled('slug')) {
            $slug = Str::slug($request->input('slug'), '-');
        } else {
            $slug = Str::slug($request->input('name'), '-');
        }



        $tag = Tag::where('id', $id);
        $tag->update([
            'name' => $request->input('name'),
            'slug' => $slug,
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
}

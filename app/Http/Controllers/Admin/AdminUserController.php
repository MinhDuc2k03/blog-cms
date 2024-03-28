<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    public function userShowAll() {
        $users = User::all();

        if (Auth::check()) {
            return view('admin.user.showAll', compact('users'));
        }
    }

    public function userCreate() {
        if (Auth::check()) {
            return view('admin.user.create');
        }
    }

    public function userShow(string $id)
    {
        $user = User::find($id);
        return view('admin.user.show')->with(['user' => $user]);
    }

    public function userEdit(string $id)
    {
        $user = User::find($id);
        return view('admin.user.update')->with(['user' => $user]);
    }
}

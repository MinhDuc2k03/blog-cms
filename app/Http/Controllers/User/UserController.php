<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function profileShow(string $name) {
        $user = User::where('name', $name)->first();

        $posts = User::find($user->id)->posts;
        return view('user.profile.show')->with(['user' => $user, 'posts' => $posts]);
    }

    public function profileEdit(Request $request) {
        $user = User::where('name', $name)->first();

        $posts = User::find($user->id)->posts;
        return view('user.profile.show')->with(['user' => $user, 'posts' => $posts]);
    }

    public function profileEditPost(Request $request, string $id) {
        $user = User::where('name', $name)->first();

        $posts = User::find($user->id)->posts;
        return view('user.profile.show')->with(['user' => $user, 'posts' => $posts]);
    }
}

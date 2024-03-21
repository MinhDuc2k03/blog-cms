<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PostFormRequest;

class UserController extends Controller
{
    public function home() {
        $posts = Post::all();
        return view('welcome', compact('posts'));
    }

    public function createPost() {
        if (Auth::check()) {
            return view('user.create');
        }
    }

    public function editPost(string $id)
    {
        if(!session()->has('url.intended') && url()->previous() == route('logout'))
        {
            session(['url.intended' => url()->previous()]);
        }

        $post = Post::find($id);
        return view('user.update')->with(['post' => $post]);
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PostFormRequest;

class UserPostController extends Controller
{
    public function home() {
        $posts = Post::all();
        return view('welcome', compact('posts'));
    }

    public function postShow(string $id)
    {
        $post = Post::find($id);
        $categoryPosts = Post::where('category_id', $post->category->id)->get();
        $hotPosts = Post::take(2)->get();

        return view('user.post.show')->with(['post' => $post, 'categoryPosts' => $categoryPosts, 'hotPosts' => $hotPosts]);
    }

    public function createPost() {
        if(!session()->has('url.intended') && url()->previous() != route('logout'))
        {
            session(['url.intended' => url()->previous()]);
        } else {
            session(['url.intended' => route('home')]);
        }

        if (Auth::check()) {
            return view('user.post.create');
        }
    }

    public function editPost(string $id)
    {
        if(!session()->has('url.intended') && url()->previous() == route('logout'))
        {
            session(['url.intended' => url()->previous()]);
        }

        $post = Post::find($id);
        return view('user.post.update')->with(['post' => $post]);
    }
}

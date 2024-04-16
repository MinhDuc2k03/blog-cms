<?php

namespace App\Http\Controllers\User;

use App\Models\User;
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
    public function home(Request $request) {
        // if (User::where('name', 'admin')->count() == 0) {
        //     User::factory()->count(1)->create();
        // }

        if ($request->filled('category_id')) {
            $posts = Post::where('category_id', $request->category_id)->get();
        } elseif ($request->filled('author_id')) {
            $posts = Post::where('author_id', $request->author_id)->get();
        } else {
            $posts = Post::all()->sortByDesc('created_at');
        }
        
        return view('welcome', compact('posts'));
    }

    public function postShow(string $id)
    {
        $post = Post::find($id);

        $key = 'blog_' . $post->id;
        if (!session()->has($key)) {
            $post->increment('views');
            session()->put($key, 1);
        }

        $categoryPosts = Post::where('category_id', $post->category->id)->get();
        $hotPosts = Post::take(2)->get();

        return view('user.post.show')->with([
            'post' => $post,
            'categoryPosts' => $categoryPosts,
            'hotPosts' => $hotPosts
        ]);
    }

    public function createPost() {
        if(!session()->has('url.intended') && url()->previous() != route('logout'))
        {
            session()->put('url.intended', url()->previous());
        } else {
            session()->put('url.intended', route('home'));
        }

        if (Auth::check()) {
            return view('user.post.create');
        }
    }

    public function editPost(string $id)
    {
        if(!session()->has('url.intended') && url()->previous() == route('logout'))
        {
            session()->put('url.intended', url()->previous());
        }

        $post = Post::find($id);
        return view('user.post.update')->with(['post' => $post]);
    }
}

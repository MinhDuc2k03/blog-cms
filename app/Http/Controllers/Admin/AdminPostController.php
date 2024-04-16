<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Facades\Session;

class AdminPostController extends Controller
{
    public function postShowAll(Request $request) {
        $posts = [];

        if ($request->option == 'category') {
            if (Category::find(Category::where('name', $request->search)->first()) != null) {
                $posts = Category::find(Category::where('name', $request->search)->first()->id)->posts;
            }
        }

        if ($request->option == 'tag') {
            if (Tag::find(Tag::where('name', $request->search)->first()) != null) {
                $posts = Tag::find(Tag::where('name', $request->search)->first()->id)->posts;
            }
        }

        if ($request->option == 'name') {
            if (User::where('name', $request->search)->first()) {
                $posts = User::find(User::where('name', $request->search)->first()->id)->posts;
            } else {
                dd(User::where('name', $request->search)->first());
            }
        }

        if ($request->option == 'name_id') {
            $posts = User::find(User::where('id', $request->search)->first()->id)->posts;
        }

        if ($request->option == 'title') {
            $posts = Post::where('title', $request->search)->get();
        }

        if ($request->option == 'description') {
            $posts = Post::where('description', $request->search)->get();
        }

        if ($request->option == 'tag_id') {
            if (Tag::find($request->search) != null) {
                $posts = Tag::find($request->search)->posts;
            }
        }

        if ($request->option == 'category_id') {
            if (Category::where('id', $request->search)->count() != 0) {
                $posts = Category::with('posts')->find($request->search)->posts;
            }
        }

        if (!$request->has('option') || !$request->has('search')) {
            $posts = Post::all();
        }
        
    //    $posts = Tag::with('posts')->find($request->tag_id)->posts;
    //    $posts = Post::all();

        if (Auth::check()) {
            return view('admin.post.showAll', compact('posts'));
        }
    }

    public function postCreate() {
        if(!session()->has('url.intended') && url()->previous() != route('logout'))
        {
            session(['url.intended' => url()->previous()]);
        } else {
            session(['url.intended' => route('home')]);
        }

        if (Auth::check()) {
            return view('admin.post.create');
        }
    }

    public function postShow(string $id)
    {
        $post = Post::find($id);
        if ($post != null) {
            return view('admin.post.show')->with(['post' => $post]);
        }
    }

    public function postEdit(string $id)
    {
        $post = Post::find($id);
        return view('admin.post.update')->with(['post' => $post]);
    }



    // public function tagShowAll() {
    //     $tags = Tag::all();

    //     if (Auth::check()) {
    //         return view('admin.tag.showAll', compact('tags'));
    //     }
    // }

    // public function tagCreate() {
    //     if (Auth::check()) {
    //         return view('admin.tag.create');
    //     }
    // }

    // public function tagEdit(string $id)
    // {
    //     $tag = Tag::find($id);
    //     return view('admin.tag.update')->with(['tag' => $tag]);
    // }



    // public function adminCreatePost(PostFormRequest $request) {
    //     $request->validated();
    // }

    // public function adminDestroy(string $id)
    // {
    //     Post::find($id)->delete();

    //     $posts = Post::all();
    //     return view('admin.post.post')->with(['posts' => $posts]);
    // }

    // public function adminUpdate(PostFormRequest $request, string $id)
    // {
    //     $thumbnailName = '';
    //     if($request->thumbnail) {
    //         $thumbnailName = time() . '_' . $request->title . '.' . $request->thumbnail->extension();
    //         $request->thumbnail->move(public_path('thumbnails'), $thumbnailName);
    //     }

    //     $slug = Str::slug($request->title, '-');

    //     $request->validated();
    //     $car = Post::where('id', $id)
    //         ->update([
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'thumbnail' => $thumbnailName,
    //         'post' => $request->post,
    //         'slug' => $slug,
    //     ]);
        
    //     $posts = Post::all();
    //     return view('admin.post.showAll')->with(['posts' => $posts]);
    // }
}

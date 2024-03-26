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

class AdminPostController extends Controller
{
    public function postShowAll(Request $request) {
        if($request->filled('tag_id') && Tag::with('posts')->find($request->input('tag_id')) != null) {
            $posts = Tag::with('posts')->find($request->input('tag_id'))->posts;
        } elseif($request->filled('tag_id') == false) {
            $posts = Post::all();
        } elseif (Tag::with('posts')->find($request->input('tag_id')) == null) {
            $posts = null;
        }
        
    //    $posts = Tag::with('posts')->find($request->input('tag_id'))->posts;
    //    $posts = Post::all();

        if (Auth::check()) {
            return view('admin.post.showAll', compact('posts'));
        }
    }

    public function postCreate() {
        if (Auth::check()) {
            return view('admin.post.create');
        }
    }

    public function postShow(string $id)
    {
        $post = Post::find($id);
        return view('admin.post.show')->with(['post' => $post]);
    }

    public function postEdit(string $id)
    {
        $post = Post::find($id);
        return view('admin.post.update')->with(['post' => $post]);
    }



    public function tagShowAll() {
        $tags = Tag::all();

        if (Auth::check()) {
            return view('admin.tag.showAll', compact('tags'));
        }
    }

    public function tagCreate() {
        if (Auth::check()) {
            return view('admin.tag.create');
        }
    }

    public function tagEdit(string $id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.update')->with(['tag' => $tag]);
    }



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

    //     $slug = Str::slug($request->input('title'), '-');

    //     $request->validated();
    //     $car = Post::where('id', $id)
    //         ->update([
    //         'title' => $request->input('title'),
    //         'description' => $request->input('description'),
    //         'thumbnail' => $thumbnailName,
    //         'post' => $request->input('post'),
    //         'slug' => $slug,
    //     ]);
        
    //     $posts = Post::all();
    //     return view('admin.post.showAll')->with(['posts' => $posts]);
    // }
}

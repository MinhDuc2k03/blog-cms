<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PostFormRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function store(PostFormRequest $request) {
        $thumbnailName = '';
        if($request->thumbnail) {
            $thumbnailName = time() . '_' . $request->title . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('thumbnails'), $thumbnailName);
        }

        $slug = Str::slug($request->input('title'), '-');

        $request->validated();
        $post = Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'thumbnail' => $thumbnailName,
            'post' => $request->input('post'),
            'author_id' => Auth::id(),
            'slug' => $slug,
        ]);

        if (Auth::user()->role == 1) {
            return redirect(route('admin.dashboard'))->with('message', 'Post successfully created');
        } else {
            return redirect(route('home'))->with('message', 'Post successfully created');
        }
    }



    public function userUpdatePost(PostFormRequest $request, string $id)
    {
        $thumbnailName = '';
        if($request->thumbnail) {
            $thumbnailName = time() . '_' . $request->title . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('thumbnails'), $thumbnailName);
        }

        $slug = Str::slug($request->input('title'), '-');

        $request->validated();
        $post = Post::where('id', $id)
            ->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'thumbnail' => $thumbnailName,
            'post' => $request->input('post'),
            'slug' => $slug,
        ]);
        
        $posts = Post::all();
        return redirect()->route('home')->with(['posts' => $posts]);
    }



    public function adminUpdatePost(PostFormRequest $request, string $id)
    {
        $thumbnailName = '';
        if($request->thumbnail) {
            $thumbnailName = time() . '_' . $request->title . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('thumbnails'), $thumbnailName);
        }

        $slug = Str::slug($request->input('title'), '-');

        $request->validated();
        $post = Post::where('id', $id)
            ->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'thumbnail' => $thumbnailName,
            'post' => $request->input('post'),
            'slug' => $slug,
        ]);
        
        $posts = Post::all();
        return redirect()->route('admin.dashboard')->with(['posts' => $posts]);
    }

    public function destroyPost(string $id)
    {
        Post::find($id)->delete();

        $posts = Post::all();
        return redirect()->route('admin.dashboard')->with(['posts' => $posts]);
    }
}

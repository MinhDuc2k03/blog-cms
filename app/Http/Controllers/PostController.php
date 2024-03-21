<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostFormRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function store(PostFormRequest $request) {
        $thumbnailName = '';
        if ($request->hasFile('thumbnail')) {
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
        $slug = Str::slug($request->input('title'), '-');

        $thumbnailName = '';
        if ($request->hasFile('thumbnail')) {
            Storage::delete(Post::where('id', $id)->first()->thumbnail);

            $thumbnailName = time() . '_' . Str::slug($request->input('title'), '_') . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('thumbnails'), $thumbnailName);
        }


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
        if ($request->hasFile('thumbnail')) {
            if($oldThumbnail = Post::where('id', $id)->first()->thumbnail)
            {
                Storage::delete(public_path('thumbnails'), $oldThumbnail);
            }

            $thumbnailName = time() . '_' . $request->title . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('thumbnails'), $thumbnailName);
        }

        $slug = Str::slug($request->input('title'), '-');

        $request->validated();

        
        $post = Post::where('id', $id);
        if ($request->hasFile('thumbnail'))
        {
            $post->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'thumbnail' => $thumbnailName,
                'post' => $request->input('post'),
                'slug' => $slug,
            ]);
        } else {
            $post->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'post' => $request->input('post'),
                'slug' => $slug,
            ]);
        }

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

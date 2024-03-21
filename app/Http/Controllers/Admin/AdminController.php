<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{


    
    public function adminDashboard() {
        $posts = Post::all();

        if (Auth::check()) {
            return view('admin.dashboard', compact('posts'));
        }
    }



    public function adminCreate() {
        if (Auth::check()) {
            return view('admin.create');
        }
    }



    public function adminCreatePost(PostFormRequest $request) {
        $request->validated();
    }



    public function adminDestroy(string $id)
    {
        Post::find($id)->delete();

        $posts = Post::all();
        return redirect()->route('admin.dashboard')->with(['posts' => $posts]);
    }



    public function adminShow(string $id)
    {
        $post = Post::find($id);
        return view('admin.show')->with(['post' => $post]);
    }



    public function adminEdit(string $id)
    {
        $post = Post::find($id);
        return view('admin.update')->with(['post' => $post]);
    }



    public function adminUpdate(PostFormRequest $request, string $id)
    {
        $thumbnailName = '';
        if($request->thumbnail) {
            $thumbnailName = time() . '_' . $request->title . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('thumbnails'), $thumbnailName);
        }

        $slug = Str::slug($request->input('title'), '-');

        $request->validated();
        $car = Post::where('id', $id)
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
}

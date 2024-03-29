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
use App\Models\Tag;
use App\Models\Category;



class PostController extends Controller
{
    public function store(PostFormRequest $request) {
        $thumbnailName = '';
        if ($request->hasFile('thumbnail')) {
            $thumbnailName = time() . '_' . $request->title . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('thumbnails'), $thumbnailName);
        }

        $slug = Str::slug($request->input('title'), '-');

        $tagIDs = [];
        if($request->filled('tag')) {
            $array = explode(',', $request->input('tag'));
            
            foreach ($array as $key => $word) {
                $array[$key] = Str::slug($word, '-');

                if ($array[$key] == '') {
                    unset($array[$key]);
                    continue;
                };

                if ($tagSlug = Tag::where('slug', $array[$key])->first())
                {
                    array_push($tagIDs, $tagSlug->id);
                }
                
            };
        }
        sort($tagIDs);

        // dd(Category::Where('name', $request->input('category'))->first()->id);

        $request->validated();
        $post = Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'thumbnail' => $thumbnailName,
            'post' => $request->input('post'),
            'author_id' => Auth::id(),
            'category_id' => Category::Where('name', $request->input('category'))->first()->id,
            'slug' => $slug,
        ]);
        $post->tags()->attach($tagIDs);

        if (parse_url(session()->get('url.intended'), PHP_URL_PATH) == '/admin/posts' && Auth::user()->role != 1) {
            return redirect(route('home'));
        }
        return redirect()->intended();
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

        $tagIDs = [];
        if($request->filled('tag')) {
            $array = explode(',', $request->input('tag'));
            
            foreach ($array as $key => $word) {
                $array[$key] = Str::slug($word, '-');

                if ($array[$key] == '') {
                    unset($array[$key]);
                    continue;
                };

                if ($tagSlug = Tag::where('slug', $array[$key])->first())
                {
                    array_push($tagIDs, $tagSlug->id);
                }
            };
        }
        sort($tagIDs);


        $request->validated();
        $post = Post::where('id', $id)
            ->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'thumbnail' => $thumbnailName,
            'post' => $request->input('post'),
            'category_id' => Category::Where('name', $request->input('category'))->first()->id,
            'slug' => $slug,
        ]);
        $post->tags()->sync($tagIDs);
        
        $posts = Post::all();
        return redirect()->route('home')->with(['posts' => $posts]);
    }



    public function adminUpdatePost(PostFormRequest $request, string $id)
    {
        $thumbnailName = '';
        if ($request->hasFile('thumbnail')) {
            $oldThumbnail = Post::where('id', $id)->first()->thumbnail;
            if ($oldThumbnail && file_exists('thumbnails/' .  $oldThumbnail))
            {
                unlink('thumbnails/' .  $oldThumbnail);
            }

            $thumbnailName = time() . '_' . Str::slug($request->input('title'), '_') . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('thumbnails'), $thumbnailName);
        }

        $slug = Str::slug($request->input('title'), '-');

        $tagIDs = [];
        if($request->filled('tag')) {
            $array = explode(',', $request->input('tag'));
            
            foreach ($array as $key => $word) {
                $array[$key] = Str::slug($word, '-');

                if ($array[$key] == '') {
                    unset($array[$key]);
                    continue;
                };

                if ($tagSlug = Tag::where('slug', $array[$key])->first())
                {
                    array_push($tagIDs, $tagSlug->id);
                }
                
            };
        }
        sort($tagIDs);


        $request->validated();

        $post = Post::find($id);
        if ($request->hasFile('thumbnail'))
        {
            $post->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'thumbnail' => $thumbnailName,
                'category_id' => Category::Where('name', $request->input('category'))->first()->id,
                'post' => $request->input('post'),
                'slug' => $slug,
            ]);
        } else {
            $post->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'category_id' => Category::Where('name', $request->input('category'))->first()->id,
                'post' => $request->input('post'),
                'slug' => $slug,
            ]);
        }
        $post->tags()->sync($tagIDs);

        $posts = Post::all();
        return redirect()->route('admin.post.showAll')->with(['posts' => $posts]);
    }

    public function destroyPost(string $id)
    {
        Post::find($id)->tags()->detach();
        Post::find($id)->delete();

        $posts = Post::all();
        if (Auth::user()->role == 1) {
            return redirect()->route('admin.post.showAll')->with(['posts' => $posts]);
        }
        return redirect()->route('home')->with(['posts' => $posts]);
    }
}

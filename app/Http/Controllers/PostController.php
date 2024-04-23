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
        $slug = Str::slug($request->title, '-');

        $duplicate = 0;
        $newSlug = $slug;
        while (Post::where('slug', $newSlug)->first() != null) {
            $duplicate += 1;
            $newSlug = $slug .= '-' . $duplicate;
        }
        $slug = $newSlug;

        $thumbnailName = '';
        if ($request->hasFile('thumbnail')) {
            $thumbnailName = time() . '_' . Str::slug($request->title, '_') . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('thumbnails'), $thumbnailName);
        }

        $tagIDs = [];
        if($request->filled('tag')) {
            $array = array_unique(array_map('trim', explode(',', $request->tag)));

            foreach ($array as $key => $word) {
                if (empty(strlen($array[$key]))) {
                    unset($array[$key]);
                    continue;
                };

                if (is_null(Tag::where('name', $array[$key])->first())) {
                    $tag = Tag::create([
                        'name' => $array[$key],
                        'slug' => Str::slug($array[$key], '-'),
                    ]);
                    array_push($tagIDs, $tag->id);
                } else {
                    array_push($tagIDs, Tag::where('name', $array[$key])->first()->id);
                }
            };
            
            sort($tagIDs);
        }

        if (is_null(Category::Where('name', $request->category)->first())) {
            $category = Category::create([
                'name' => $request->category,
                'slug' => Str::slug($request->category, '_'),
            ]);
            $data['category_id'] = $category->id;
        } else {
            $data['category_id'] = Category::Where('name', $request->category)->first()->id;
        }
        
        $request->validated();
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['thumbnail'] = $thumbnailName;
        $data['post'] = $request->post;
        $data['author_id'] = Auth::id();
        $data['slug'] = $slug;

        $post = Post::create($data);
        $post->tags()->attach($tagIDs);

        if (parse_url(session()->get('url.intended'), PHP_URL_PATH) == '/admin/posts' && Auth::user()->role == 0) {
            return redirect(route('home'));
        }
        return redirect()->intended();
    }



    public function userUpdatePost(PostFormRequest $request, string $id)
    {
        $slug = Str::slug($request->title, '-');

        $duplicate = 0;
        $newSlug = $slug;

        while (Post::where('slug', $newSlug)->first() != null && !Post::where('slug', $newSlug)->first() == Post::where('id', $id)->first()) {
            $duplicate += 1;
            $newSlug = $slug .= '-' . $duplicate;
        }
        $slug = $newSlug;

        $thumbnailName = '';
        if ($request->hasFile('thumbnail')) {
            unlink(public_path('thumbnails/' . Post::find($id)->thumbnail));

            $thumbnailName = time() . '_' . Str::slug($request->title, '_') . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('thumbnails'), $thumbnailName);

            $data['thumbnail'] = $thumbnailName;
        }

        $tagIDs = [];
        if($request->filled('tag')) {
            // $array = explode(',', $request->tag);
            // $array = array_map('trim', $array);
            // $array = array_unique($array);
            $array = array_unique(array_map('trim', explode(',', $request->tag)));
            
            foreach ($array as $key => $word) {
                if (empty(strlen($array[$key]))) {
                    unset($array[$key]);
                    continue;
                };

                if (is_null(Tag::where('name', $array[$key])->first())) {
                    $tag = Tag::create([
                        'name' => $array[$key],
                        'slug' => Str::slug($array[$key], '-'),
                    ]);
                    array_push($tagIDs, $tag->id);
                } else {
                    array_push($tagIDs, Tag::where('name', $array[$key])->first()->id);
                }
            };
            
            sort($tagIDs);
        }


        $request->validated();
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['post'] = $request->post;
        $data['category_id'] = Category::Where('name', $request->category)->first()->id;
        $data['slug'] = $slug;

        $post = Post::where('id', $id)->update($data);
        Post::where('id', $id)->first()->tags()->sync($tagIDs);

        
        $posts = Post::all();
        return redirect()->route('home')->with(['posts' => $posts]);
    }



    public function adminUpdatePost(PostFormRequest $request, string $id)
    {
        $slug = Str::slug($request->title, '-');

        $duplicate = 0;
        $newSlug = $slug;

        while (Post::where('slug', $newSlug)->first() != null && !Post::where('slug', $newSlug)->first() == Post::where('id', $id)->first()) {
            $duplicate += 1;
            $newSlug = $slug .= '-' . $duplicate;
        }
        $slug = $newSlug;

        $thumbnailName = '';
        if ($request->hasFile('thumbnail')) {
            unlink(public_path('thumbnails/' . Post::find($id)->thumbnail));

            $thumbnailName = time() . '_' . Str::slug($request->title, '_') . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('thumbnails'), $thumbnailName);

            $data['thumbnail'] = $thumbnailName;
        }

        $tagIDs = [];
        if($request->filled('tag')) {
            // $array = explode(',', $request->tag);
            // $array = array_map('trim', $array);
            // $array = array_unique($array);
            $array = array_unique(array_map('trim', explode(',', $request->tag)));
            
            foreach ($array as $key => $word) {
                if (empty(strlen($array[$key]))) {
                    unset($array[$key]);
                    continue;
                };

                if (is_null(Tag::where('name', $array[$key])->first())) {
                    $tag = Tag::create([
                        'name' => $array[$key],
                        'slug' => Str::slug($array[$key], '-'),
                    ]);
                    array_push($tagIDs, $tag->id);
                } else {
                    array_push($tagIDs, Tag::where('name', $array[$key])->first()->id);
                }
            };
            
            sort($tagIDs);
        }


        $request->validated();
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['post'] = $request->post;
        $data['category_id'] = Category::Where('name', $request->category)->first()->id;
        $data['slug'] = $slug;

        $post = Post::where('id', $id)->update($data);
        Post::where('id', $id)->first()->tags()->sync($tagIDs);

        
        $posts = Post::all();
        return redirect()->route('admin.post.showAll')->with(['posts' => $posts]);
    }

    public function destroyPost(string $id)
    {
        if (Post::find($id)->thumbnail) {
            unlink(public_path('thumbnails/' . Post::find($id)->thumbnail));
        }
        Post::find($id)->tags()->detach();
        Post::find($id)->delete();

        $posts = Post::all();
        return redirect()->to(url()->previous());
    }
}

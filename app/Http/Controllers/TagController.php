<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TagFormRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function store(TagFormRequest $request) {
        $slug = '';
        if($request->filled('slug')) {
            $slug = Str::slug($request->slug, '-');
        } else {
            $slug = Str::slug($request->name, '-');
        }

        $data['name'] = $request->name;
        $data['slug'] = $slug;
        $data['author_id'] = Auth::id();

        $tag = Tag::create($data);

        if (Auth::user()->role != 0) {
            return redirect(route('admin.tag.showAll'))->with('message', 'Tag successfully created');
        } else {
            return redirect(route('home'))->with('message', 'Tag successfully created');
        }
    }

    public function adminUpdateTag(Request $request, string $id)
    {
        $slug = '';
        if($request->filled('slug')) {
            $slug = Str::slug($request->slug, '-');
        } else {
            $slug = Str::slug($request->name, '-');
        }

        $data['name'] = $request->name;
        $data['slug'] = $slug;

        $tag = Tag::where('id', $id)->update($data);

        $tags = Tag::all();
        return redirect()->route('admin.tag.showAll')->with(['tags' => $tags]);
    }

    public function destroyTag(string $id)
    {
        Tag::find($id)->delete();
        $tags = Tag::all();
        return redirect()->route('admin.tag.showAll')->with(['tags' => $tags]);
    }
}

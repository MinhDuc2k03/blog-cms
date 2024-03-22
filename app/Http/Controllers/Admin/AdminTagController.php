<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Facades\Session;

class AdminTagController extends Controller
{
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

    public function tagShow(string $id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.show')->with(['tag' => $tag]);
    }

    public function tagEdit(string $id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.update')->with(['tag' => $tag]);
    }
}

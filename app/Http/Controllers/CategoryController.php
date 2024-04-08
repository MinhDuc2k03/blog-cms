<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(CategoryFormRequest $request) {
        $slug = '';
        if($request->filled('slug')) {
            $slug = Str::slug($request->slug, '_');
        } else {
            $slug = Str::slug($request->name, '_');
        }

        $data['name'] = $request->name;
        $data['slug'] = $slug;

        $category = Category::create($data);

        if (Auth::user()->role != 0) {
            return redirect(route('admin.category.showAll'))->with('message', 'Category successfully created');
        } else {
            return redirect(route('home'))->with('message', 'Category successfully created');
        }
    }

    public function adminUpdateCategory(CategoryFormRequest $request, string $id)
    {
        $slug = '';
        if($request->filled('slug')) {
            $slug = Str::slug($request->slug, '_');
        } else {
            $slug = Str::slug($request->name, '_');
        }

        $data['name'] = $request->name;
        $data['slug'] = $slug;

        $category = Category::where('id', $id)->update($data);

        $categories = Category::all();
        return redirect()->route('admin.category.showAll')->with(['categories' => $categories]);
    }

    public function destroyCategory(string $id)
    {
        Category::find($id)->posts()->delete();
        Category::find($id)->delete();

        $categories = Category::all();
        return redirect()->route('admin.category.showAll')->with(['categories' => $categories]);
    }
}

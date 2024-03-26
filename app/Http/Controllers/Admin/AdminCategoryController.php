<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Facades\Session;

class AdminCategoryController extends Controller
{
    public function categoryShowAll() {
        $categories = Category::all();

        if (Auth::check()) {
            return view('admin.category.showAll', compact('categories'));
        }
    }

    public function categoryCreate() {
        if (Auth::check()) {
            return view('admin.category.create');
        }
    }

    public function categoryShow(string $id)
    {
        $category = Category::find($id);
        return view('admin.category.show')->with(['category' => $category]);
    }

    public function categoryEdit(string $id)
    {
        $category = Category::find($id);
        return view('admin.category.update')->with(['category' => $category]);
    }
}

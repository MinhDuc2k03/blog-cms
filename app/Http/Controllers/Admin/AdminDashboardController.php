<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function dashboardShowAll() {
        $posts = Post::all();
        $categories = Category::all();
        $users = User::all();
        $tags = Tag::all();

        if (Auth::check()) {
            return view('admin.dashboard.showAll')->with(['posts' => $posts, 'categories' => $categories, 'users' => $users, 'tags' => $tags]);
        }
    }
}

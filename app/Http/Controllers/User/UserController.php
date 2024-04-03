<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserEditFormRequest;

class UserController extends Controller
{
    public function profileShow(string $name) {
        $user = User::where('name', $name)->first();

        $posts = User::find($user->id)->posts;
        return view('user.profile.show')->with(['user' => $user, 'posts' => $posts]);
    }

    public function profileEdit(string $name) {
        $user = User::where('name', $name)->first();

        $posts = User::find($user->id)->posts;
        return view('user.profile.edit')->with(['user' => $user, 'posts' => $posts]);
    }

    public function profileEditPost(UserEditFormRequest $request, string $name) {
        if ($request->input('new_pass') != '') {
            if ((Hash::check($request->get('new_pass'), Auth::user()->password))) {
                return redirect()->back();
            }
        }
        
        if ((!Hash::check($request->get('old_pass'), Auth::user()->password))) {
            return redirect()->back();
        }

        $request->validated();

        $data['display_name'] = $request->input('display_name');
        $data['email'] = $request->input('email');
        if ($request->input('new_pass') != '') {
            $data['password'] = Hash::make($request->input('new_pass'));
        }

        User::where('name', $name)->first()->update($data);

        $user = User::where('name', $name)->first();
        $posts = User::find($user->id)->posts;
        return redirect()->route('profile.show', ['name' => $request->name]);
    }
}

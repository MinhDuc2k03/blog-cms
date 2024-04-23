<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
        $pfpName = '';
        if ($request->hasFile('profile_picture')) {
            if (User::where('name', $name)->first()->profile_picture != null) {
                Storage::delete(User::where('name', $name)->first()->profile_picture);
            }

            $pfpName = time() . '_' . Str::slug($request->name, '_') . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(storage_path('app/public/profiles/'), $pfpName);
        }



        if ($request->new_pass != '') {
            if ((Hash::check($request->get('new_pass'), Auth::user()->password))
            || ($request->new_pass != $request->new_pass_confirmation)
            || (!Hash::check($request->get('old_pass'), Auth::user()->password)))
            {
                return redirect()->back();
            }
        }

        $request->validated();

        if ($request->hasFile('profile_picture')) {$data['profile_picture'] = $pfpName;}
        $data['display_name'] = $request->display_name;
        $data['email'] = $request->email;
        if ($request->new_pass != '') {$data['password'] = Hash::make($request->new_pass);}

        User::where('name', $name)->first()->update($data);

        $user = User::where('name', $name)->first();
        $posts = User::find($user->id)->posts;
        return redirect()->route('profile.show', ['name' => $request->name]);
    }
}

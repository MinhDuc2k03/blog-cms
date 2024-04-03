@extends('layout')

@section('title', 'User Profile Edit Page')
@section('content')
<div class="w-10/12 mt-32 m-auto">
    <div class="flex mb-12 gap-1.5 items-baseline w-full">
        <p class="text-3xl font-semibold text-gray-900">User Information</p>
        <p class="text-sm align-text-bottom">Update user info</p>
        <a href="{{ route('profile.show', $user->name) }}" class="text-purple-800 text-sm ml-2">&larr; Back to user's page</a>
    </div>

    <form class="space-y-6" action="{{ route('profile.update', ["name" => $user->name]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <div class="flex mb-1">
                <label for="thumbnail" class="block text-sm font-medium leading-6 text-gray-900">Profile picture</label>
            </div>                    
            <div class="mt-2">
                <input type="file" name="thumbnail" class="pl-2 bg-white block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div>
            <div class="flex mb-1">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
            </div>
            <div class="mt-2">
                <input type="text" name="name" value="{{$user->name}}" disabled="disabled" class="bg-slate-50 pl-2 block w-full rounded-md border-0 py-1.5 text-gray-500 cursor-not-allowed shadow-sm ring-1 ring-inset ring-gray-300 sm:text-sm sm:leading-6">
            </div>
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div>
            <div class="flex mb-1">
                <label for="display_name" class="block text-sm font-medium leading-6 text-gray-900">Display Name</label>
                <div class="text-red-500 select-none ml-1"data-twe-toggle="tooltip" title="This field is required">*</div>
            </div>
            <div class="mt-2">
                <input required type="text" name="display_name" value="{{$user->display_name}}" class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @if ($errors->has('display_name'))
                <span class="text-danger">{{ $errors->first('display_name') }}</span>
            @endif
        </div>

        <div>
            <div class="flex mb-1">
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                <div class="text-red-500 select-none ml-1"data-twe-toggle="tooltip" title="This field is required">*</div>
            </div>
            <div class="mt-2">
                <input required type="text" name="email" value="{{$user->email}}" class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div>
            <div class="flex mb-1">
                <label for="old_pass" class="block text-sm font-medium leading-6 text-gray-900">Old Password</label>
                <div class="text-red-500 select-none ml-1"data-twe-toggle="tooltip" title="This field is required">*</div>
            </div>
            <div class="mt-2">
                <input name="old_pass" type="password" required class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @if ($errors->has('old_pass'))
                <span class="text-danger">{{ $errors->first('old_pass') }}</span>
            @endif
        </div>

        <div class="pt-16">
            <div class="flex mb-1">
                <label for="new_pass" class="block text-sm font-medium leading-6 text-gray-900">New Password</label>
            </div>
            <div class="mt-2">
                <input name="new_pass" type="password" class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            <div class="text-sm mt-1.5 text-red-500">Leave empty if you don't want to change your password.</div>
            @if ($errors->has('new_pass'))
                <span class="text-danger">{{ $errors->first('new_pass') }}</span>
            @endif
        </div>

        <div>
            <div class="flex mb-1">
                <label for="new_pass_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Repeat Password</label>
            </div>
            <div class="mt-2">
                <input name="new_pass_confirmation" type="password" class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            <div class="text-sm mt-1.5 text-red-500">Leave empty if you don't want to change your password.</div>
            @if ($errors->has('new_pass_confirmation'))
                <span class="text-danger">{{ $errors->first('new_pass_confirmation') }}</span>
            @endif
        </div>
        
        <div class="pt-10 flex justify-end">
            <button type="submit" class=" w-1/12 rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
        </div>
    </form>
    <div class="mt-40"></div>
</div>
@endsection
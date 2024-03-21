@extends('layout')

@section('title', 'Admin Update Post Page')
@section('content')
    <div class="">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-12 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Update Post</h2>
        </div>

        <div class="sm:mx-auto sm:w-full sm:max-w-sm mt-10">
            <a href="{{ route('admin.dashboard') }}" class="text-purple-800">&larr; Back</a>
        </div>

        <div class="sm:mx-auto sm:w-full sm:max-w-sm pb-40"> 
            <form class="space-y-6" action="{{ route('admin.update', ["id" => $post->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- POST'S TITLE --}}
                <div>
                    <div class="flex mb-1">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="text-red-500 select-none ml-1">*</div>
                    </div>
                    <div class="mt-2">
                        <input type="text" name="title" value="{{$post->title}}" class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                    </div>
                </div>

                {{-- POST'S DESCRIPTION --}}
                <div>
                    <div class="flex mb-1">
                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                    </div>  
                    <div class="mt-2">
                        <input type="text" name="description" value="{{$post->description}}" class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                    </div>
                </div>

                {{-- POST'S IMAGE --}}
                <div>
                    <div class="flex mb-1">
                        <label for="thumbnail" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                    </div>                    
                    <div class="mt-2">
                        <input type="file" name="thumbnail" class="pl-2 bg-white block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                    </div>
                </div>

                {{-- POST'S BODY --}}
                <div>
                    <div class="flex mb-1">
                        <label for="post" class="block text-sm font-medium leading-6 text-gray-900">Post</label>
                        <div class="text-red-500 select-none ml-1">*</div>
                    </div>
                    <div class="mt-2">
                        <textarea cols="50" rows="10" name="post" class="pl-2 pt-1">{{$post->post}}</textarea>
                    </div>
                </div>

                @if (session()->has('error'))
                    <li class="text-red-600 list-none text-sm">
                        {{session('error')}}
                    </li>
                @endif

                {{-- SUBMIT BUTTON --}}
                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500">Update Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection
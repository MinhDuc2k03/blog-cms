@extends('layoutNoHeader')

@section('title', 'User Update Post Page')
@section('content')
@php
    $tags = '';
    foreach ($post->tags as $key=>$tag) {
        $tags .= $tag->name;
        if ($key != array_key_last($post->tags->toArray())) {
            $tags .= ', ';
        }
    }
@endphp
<div class="w-3/5 mx-auto">
    <div class="flex mt-12 gap-1.5 items-baseline w-full">
        <p class="text-3xl font-semibold text-gray-900">Post</p>
        <p class="text-sm align-text-bottom">Update post</p>
        <a href="{{ route('home') }}" class="text-purple-800 text-sm ml-2">&larr; Back to home</a>
    </div>

    <div class="w-full pb-40"> 
        <form class="space-y-6" action="{{ route('post.update', ["id" => $post->id]) }}" method="POST" enctype="multipart/form-data">
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

            {{-- POST'S CATEGORY --}}
            <div>
                <div class="flex mb-1">
                    <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                    <div class="text-red-500 select-none ml-1"data-twe-toggle="tooltip" title="This field is required">*</div>
                </div>  
                <div class="mt-2">
                    <input type="text" name="category" value="{{$post->category->name}}" class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            {{-- POST'S TAGS --}}
            <div>
                <div class="flex mb-1">
                    <label for="tag" class="block text-sm font-medium leading-6 text-gray-900">Tags</label>
                </div>  
                <div class="mt-2">
                    <input type="text" name="tag" value="{{$tags}}" class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            {{-- POST'S BODY --}}
            <div>
                <div class="flex mb-1">
                    <label for="post" class="block text-sm font-medium leading-6 text-gray-900">Post</label>
                    <div class="text-red-500 select-none ml-1">*</div>
                </div>
                <div class="mt-2">
                    <textarea id="editor" rows="10" name="post">{{$post->post}}</textarea>
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
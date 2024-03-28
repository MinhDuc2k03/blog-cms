@extends('layoutNoHeader')

@section('title', 'Admin Creage Post Page')
@section('content')
<div class="w-3/5 mx-auto">
    <div class="flex mt-12 gap-1.5 items-baseline w-full">
        <p class="text-3xl font-semibold text-gray-900">Post</p>
        <p class="text-sm align-text-bottom">Create post</p>
        <a href="{{ route('admin.post.showAll') }}" class="text-purple-800 text-sm ml-2">&larr; Back to all posts</a>
    </div>

    <div class="w-full pb-40"> 
        <form class="space-y-6" action="{{ route('admin.post.create.post') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- POST'S TITLE --}}
            <div>
                <div class="flex mb-1">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                    <div class="text-red-500 select-none ml-1"data-twe-toggle="tooltip" title="This field is required">*</div>
                </div>
                <div class="mt-2">
                    <input type="text" name="title" class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="text-sm mt-1.5 text-slate-600">Slug will be automatically generated from your title.</div>
            </div>

            {{-- POST'S DESCRIPTION --}}
            <div>
                <div class="flex mb-1">
                    <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                </div>  
                <div class="mt-2">
                    <input type="text" name="description" class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            {{-- POST'S IMAGE --}}
            <div>
                <div class="flex mb-1">
                    <label for="thumbnail" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                </div>                    
                <div class="mt-2">
                    <input type="file" name="thumbnail" class="pl-2 bg-white block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            {{-- POST'S CATEGORY --}}
            <div>
                <div class="flex mb-1">
                    <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                    <div class="text-red-500 select-none ml-1"data-twe-toggle="tooltip" title="This field is required">*</div>
                </div>  
                <div class="mt-2">
                    <input type="text" name="category" class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="text-red-500 select-none mt-3 ml-1 text-sm">{{ $errors->first('category') }}</div>
            </div>

            {{-- POST'S TAGS --}}
            <div>
                <div class="flex mb-1">
                    <label for="tag" class="block text-sm font-medium leading-6 text-gray-900">Tags</label>
                </div>  
                <div class="mt-2">
                    <input type="text" name="tag" class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            {{-- POST'S BODY --}}
            <div>
                <div class="flex mb-1">
                    <label for="post" class="block text-sm font-medium leading-6 text-gray-900">Post</label>
                    <div class="text-red-500 select-none ml-1"data-twe-toggle="tooltip" title="This field is required">*</div>
                </div>
                <div class="mt-2">
                    <textarea rows="10" name="post" class="pl-2 pt-1 rounded-md w-full ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                </div>
            </div>

            @if (session()->has('error'))
                <li class="text-red-600 list-none text-sm">
                    {{session('error')}}
                </li>
            @endif

            {{-- SUBMIT BUTTON --}}
            <div>
                <button type="submit" class="flex w-1/12 justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection
@extends('layoutNoHeader')

@section('title', 'Admin Creage Category Page')
@section('content')
<div class="w-3/5 mx-auto">
    <div class="flex mt-12 gap-1.5 items-baseline w-full">
        <p class="text-3xl font-semibold text-gray-900">Category</p>
        <p class="text-sm align-text-bottom">Create category</p>
        <a href="{{ route('admin.category.showAll') }}" class="text-purple-800 text-sm ml-2">&larr; Back to all categories</a>
    </div>

    <div class="w-full pb-40"> 
        <form class="space-y-6" action="{{ route('admin.category.create.post') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- CATEGORY'S NAME --}}
            <div>
                <div class="flex mb-1">
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                    <div class="text-red-500 select-none ml-1" data-twe-toggle="tooltip" title="This field is required">*</div>
                </div>
                <div class="mt-2">
                    <input type="text" name="name" class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="text-sm mt-1.5 text-slate-600">Slug will be automatically generated from the category's name.</div>
                <div class="text-red-500 select-none mt-3 ml-1 text-sm">{{ $errors->first('name') }}</div>
            </div>

            {{-- CATEGORY'S SLUG --}}
            {{-- <div>
                <div class="flex mb-1">
                    <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Slug</label>
                </div>  
                <div class="mt-2">
                    <input type="text" name="slug" class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div> --}}

            {{-- SUBMIT BUTTON --}}
            <div>
                <button type="submit" class="flex w-1/12 justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection
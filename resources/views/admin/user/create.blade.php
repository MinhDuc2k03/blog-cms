@extends('layoutNoHeader')

@section('title', 'Admin Creage Tag Page')
@section('content')
<div class="w-3/5 mx-auto">
    <div class="flex mt-12 gap-1.5 items-baseline w-full">
        <p class="text-3xl font-semibold text-gray-900">Tag</p>
        <p class="text-sm align-text-bottom">Create tag</p>
        <a href="{{ route('admin.tag.showAll') }}" class="text-purple-800 text-sm ml-2">&larr; Back to all tags</a>
    </div>

    <div class="w-full pb-40"> 
        <form class="space-y-6" action="{{ route('admin.tag.create.post') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- USER'S NAME --}}
            <div>
                <div class="flex mb-1">
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                    <div class="text-red-500 select-none ml-1" data-twe-toggle="tooltip" title="This field is required">*</div>
                </div>
                <div class="mt-2">
                    <input type="text" name="name" class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="text-red-500 select-none mt-3 ml-1 text-sm">{{ $errors->first('name') }}</div>
            </div>

            {{-- USER'S EMAIL --}}
            <div>
                <div class="flex mb-1">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="text-red-500 select-none ml-1" data-twe-toggle="tooltip" title="This field is required">*</div>
                </div>
                <div class="mt-2">
                    <input type="text" name="email" class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="text-red-500 select-none mt-3 ml-1 text-sm">{{ $errors->first('email') }}</div>
            </div>

            {{-- USER'S PASSWORD --}}
            <div>
                <div class="flex mb-1">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="text-red-500 select-none ml-1" data-twe-toggle="tooltip" title="This field is required">*</div>
                </div>
                <div class="mt-2">
                    <input type="password" name="password" class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="text-red-500 select-none mt-3 ml-1 text-sm">{{ $errors->first('password') }}</div>
            </div>

            {{-- SUBMIT BUTTON --}}
            <div>
                <button type="submit" class="flex w-1/12 justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection
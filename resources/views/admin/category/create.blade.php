@extends('layout')

@section('title', 'Admin Creage Category Page')
@section('content')
    <div class="">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-12 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Create a Category</h2>
        </div>

        <div class="sm:mx-auto sm:w-full sm:max-w-sm mt-10">
            <a href="{{ route('admin.category.showAll') }}" class="text-purple-800">&larr; Back</a>
        </div>

        <div class="sm:mx-auto sm:w-full sm:max-w-sm pb-40"> 
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
                    <div class="text-red-500 select-none mt-3 ml-1 text-sm">
                        {{ $errors->first('name') }}
                    </div>
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
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
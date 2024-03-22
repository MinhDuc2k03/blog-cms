@extends('layout')

@section('title', 'Admin Update Tag Page')
@section('content')
    <div class="">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-12 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Update Tag</h2>
        </div>

        <div class="sm:mx-auto sm:w-full sm:max-w-sm mt-10">
            <a href="{{ route('admin.tag.showAll') }}" class="text-purple-800">&larr; Back</a>
        </div>

        <div class="sm:mx-auto sm:w-full sm:max-w-sm pb-40"> 
            <form class="space-y-6" action="{{ route('admin.tag.update', ["id" => $tag->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- TAG'S NAME --}}
                <div>
                    <div class="flex mb-1">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                        <div class="text-red-500 select-none ml-1">*</div>
                    </div>
                    <div class="mt-2">
                        <input type="text" name="name" value="{{$tag->name}}" class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                {{-- TAG'S SLUG --}}
                <div>
                    <div class="flex mb-1">
                        <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Slug</label>
                    </div>  
                    <div class="mt-2">
                        <input type="text" name="slug" value="{{$tag->slug}}" class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                @if (session()->has('error'))
                    <li class="text-red-600 list-none text-sm">
                        {{session('error')}}
                    </li>
                @endif

                {{-- SUBMIT BUTTON --}}
                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500">Update Tag</button>
                </div>
            </form>
        </div>
    </div>
@endsection
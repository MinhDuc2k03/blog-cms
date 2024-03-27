@extends('admin.layouts.layoutSidebar')

@section('title', 'Admin Category Page')
@section('content')
<div class="p-4 sm:ml-64">
    <div class="sm:mx-auto sm:w-4/5 flex mt-12 gap-1.5 items-baseline w-4/5">
        <p class="text-3xl font-semibold text-gray-900">Category</p>
        @if ($categories->count() > 1)
            <p class="text-sm align-text-bottom">Showing {{$categories->count()}} categories</p>
        @else
            <p class="text-sm align-text-bottom">Showing {{$categories->count()}} category</p>
        @endif
    </div>

    {{-- <div>
        @auth
            <a href="{{ route('logout') }}">LOGOUT</a>
            <h1 class="content-center w-full">Hello {{auth()->user()->name}}, YOU ARE AN ADMIN</h1>
        @elseguest
            <a href="{{ route('login') }}">LOGIN</a>
        @endauth
    </div> --}}

    @if (session('message'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-3 py-3 shadow-md" role="alert">
            <div class="flex">
            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
            <div>
                <p class="font-bold">{{session('message')}}</p>
                <p class="text-sm"></p>
            </div>
            </div>
        </div>    
    @endif

    <div class="sm:mx-auto sm:w-4/5 flex mt-12 gap-1.5 items-baseline w-4/5">
        <a href="{{route('admin.category.create')}}" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create Category</a>
    </div>

    <div class="w-4/5 m-auto mt-5 bg-slate-100">
        <table class="w-full border-collapse border border-black text-sm table-auto">
            <thead class="border border-black">
                <tr class="text-nowrap bg-slate-400">
                    <th class="px-3 py-3 border border-black w-20">Id</th>
                    <th class="px-3 py-3 border border-black">Name</th>
                    <th class="px-3 py-3 border border-black">Slug</th>
                    <th class="px-3 py-3 border border-black w-0">Actions</th>
                </tr>
            </thead>
            <tbody class="border border-black">
                @foreach ($categories as $category)
                <tr class="text-base">
                    <td class="px-3 py-3 border border-black">{{$category->id}}</td>
                    <td class="px-3 py-3 border border-black">{{$category->name}}</td>
                    <td class="px-3 py-3 border border-black">{{$category->slug}}</td>
                    <td class="px-3 py-3 border border-black">
                        <div class="gap-2 flex w-fit">
                            <div>
                                <a href="{{ route('admin.category.show', $category->id) }}" class="select-none text-xs font-semibold text-purple-600 hover:text-purple-950 hover:drop-shadow-2xl hover:underline">View</a>
                            </div>
                            <div>
                                <a href="{{ route('admin.category.edit', $category->id) }}" class="select-none text-xs font-semibold text-purple-600 hover:text-purple-950 hover:drop-shadow-2xl hover:underline">Edit</a>
                            </div>
                            <form action="{{ route('admin.category.delete', $category->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this category? DOING THIS WILL ALSO DELETE POSTS THAT HAS THIS CATEGORY.')" class="select-none text-xs font-semibold text-purple-600 hover:text-purple-950 hover:drop-shadow-2xl hover:underline">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="relative overflow-x-auto">
        
    </div>
</div>
@endsection
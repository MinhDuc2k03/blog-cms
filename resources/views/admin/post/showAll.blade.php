@extends('admin.layouts.layoutSidebar')

@section('title', 'Admin Post Page')
@section('content')
<div class="p-4 sm:ml-64">
    <div class="sm:mx-auto sm:w-4/5 flex mt-12 gap-1.5 items-baseline w-4/5">
        <p class="text-3xl font-semibold text-gray-900">Post</p>
        @if ($posts->count() > 1)
            <p class="text-sm align-text-bottom">Showing {{$posts->count()}} posts</p>
        @else
            <p class="text-sm align-text-bottom">Showing {{$posts->count()}} post</p>
        @endif
    </div>

    <div>
        @auth
            <a href="{{ route('logout') }}">LOGOUT</a>
            <h1 class="content-center w-full">Hello {{auth()->user()->name}}, YOU ARE AN ADMIN</h1>
        @elseguest
            <a href="{{ route('login') }}">LOGIN</a>
        @endauth
    </div>

    <div class="sm:mx-auto sm:w-4/5 flex mt-12 gap-1.5 items-baseline w-4/5">
        <a href="{{route('admin.post.create')}}" class="rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create Post</a>
    </div>

    <div class="w-4/5 m-auto mt-5 bg-slate-100 border-2 border-slate-400">
        <table class="w-full divide-y dark:divide-gray-700 text-sm table-fixed">
            <thead class="divide-y dark:divide-gray-700">
                <tr class="text-nowrap">
                    <th class="px-4 py-1.5 w-14">Id</th>
                    <th class="px-4 py-1.5 bg-slate-200 w-36">Author<span class="select-none"> | </span>Id</th>
                    <th class="px-4 py-1.5 w-36">Title</th>
                    <th class="px-4 py-1.5 bg-slate-200">Description</th>
                    <th class="px-4 py-1.5 w-32">Image</th>
                    <th class="px-4 py-1.5 bg-slate-200">Post</th>
                    <th class="px-4 py-1.5 w-20">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y dark:divide-gray-700">
                @if ($posts != null)
                    @foreach ($posts as $post)
                    <tr>
                        <td class="px-4 py-1.5">{{$post->id}}</td>
                        <td class="px-4 py-1.5 bg-slate-200">{{$post->user->name}}<span class="select-none"> | </span>{{$post->user->id}}</td>
                        <td class="px-4 py-1.5">{{$post->title}}</td>
                        <td class="px-4 py-1.5 bg-slate-200">
                            <p class="line-clamp-1">
                                {{$post->description}}
                            </p>
                        </td>
                        <td class="px-4 py-1.5">
                            @if ($post->thumbnail == '')
                                <div class="select-none">-</div>
                            @else
                                <img src="{{ asset('thumbnails/' .  $post->thumbnail) }}" width= "100" height="100" alt="">
                            @endif
                        </td>
                        <td class="px-4 py-1.5 bg-slate-200">
                            <p class="line-clamp-2 text-clip">
                                {{$post->post}}
                            </p>
                        </td>
                        <td class="px-4 py-1.5 gap-2">
                            <div>
                                <a href="{{ route('admin.post.show', $post->id) }}" class="select-none text-xs font-semibold text-purple-600 hover:text-purple-950 hover:drop-shadow-2xl hover:underline">View</a>
                            </div>
                            <div>
                                <a href="{{ route('admin.post.edit', $post->id) }}" class="select-none text-xs font-semibold text-purple-600 hover:text-purple-950 hover:drop-shadow-2xl hover:underline">Edit</a>
                            </div>
                            <form action="{{ route('admin.post.delete', $post->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this post?')" class="select-none text-xs font-semibold text-purple-600 hover:text-purple-950 hover:drop-shadow-2xl hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div class="relative overflow-x-auto">
        
    </div>
</div>
@endsection
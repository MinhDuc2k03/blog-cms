@extends('layout')

@section('title', 'Admin Post Page')
@section('content')
    <div>
        @auth
            <a href="{{ route('logout') }}">LOGOUT</a>
            <h1 class="content-center w-full">Hello {{auth()->user()->name}}, YOU ARE AN ADMIN</h1>
        @elseguest
            <a href="{{ route('login') }}">LOGIN</a>
        @endauth
    </div>

    @if (session('message'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
            <div class="py-1.5"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
            <div>
                <p class="font-bold">{{session('message')}}</p>
                <p class="text-sm"></p>
            </div>
            </div>
        </div>    
    @endif
    <div>
        <a href="{{route('admin.post.create')}}">CREATE POST</a>
        <a href=""></a>
    </div>

    <div class="w-4/5 m-auto mt-10 bg-slate-100 border-2 border-slate-400">
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
            </tbody>
        </table>
    </div>

    <div class="relative overflow-x-auto">
        
    </div>
@endsection
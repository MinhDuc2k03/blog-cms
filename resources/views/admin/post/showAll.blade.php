@extends('admin.layouts.layoutSidebar')

@section('title', 'Admin Post Page')
@section('content')
<div class="py-4 sm:ml-64">
    <div class="sm:mx-auto sm:w-4/5 flex mt-12 gap-1.5 items-baseline w-4/5">
        <p class="text-3xl font-semibold text-gray-900">Post</p>
        @if ($posts != null)
            @if ($posts->count() > 1)
                <p class="text-sm align-text-bottom">Showing {{$posts->count()}} posts</p>
            @else
                <p class="text-sm align-text-bottom">Showing {{$posts->count()}} post</p>
            @endif
        @else
        <p class="text-sm align-text-bottom">Showing 0 post</p>
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
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-3 py-3 shadow-md" role="alert" id="notif">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                <div>
                    <p class="font-bold">{{session('message')}}</p>
                    <p class="text-sm"></p>
                </div>
            </div>
        </div>    
    @endif

    <div class="sm:mx-auto sm:w-4/5 flex mt-12 gap-1.5 items-baseline w-4/5 justify-between">
        <div class="flex flex-row items-baseline">
            <a href="{{route('admin.post.create')}}" class="rounded-md bg-indigo-600 px-3 py-1 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create Post</a>
            @if (Request::get('option'))
            <a href="{{ route('admin.post.showAll') }}" class="text-purple-800 text-sm ml-2">&larr; Clear search</a>
            @endif
        </div>
        <form method="GET" action="{{ route('admin.post.showAll') }}" class="flex flex-row">
            <select name="option" id="option" class="mr-2 text-xs rounded-md">
                <option value="id">Id</option>
                <option value="name">Author</option>
                <option value="title">Title</option>
                <option value="description">Description</option>
                <option value="category">Category</option>
                <option value="tag">Tag</option>
                <option value="name_id">Author Id</option>
                <option value="category_id">Category Id</option>
                <option value="tag_id">Tag Id</option>
            </select>
            <input type="text" required name="search" id="search" placeholder="Search..." class="rounded-tl-md rounded-bl-md text-sm pl-1">
            <button class="rounded-tr-md rounded-br-md bg-indigo-600 px-3 py-1 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Search</button>
        </form>
    </div>

    <div class="w-4/5 m-auto mt-5 bg-slate-100">
        <table class="w-full border-collapse border border-black text-sm table-auto">
            <thead class="border border-black">
                <tr class="text-nowrap bg-slate-400">
                    <th class="px-3 py-3 border border-black">Id</th>
                    <th class="px-3 py-3 border border-black">Author<span class="select-none"> | </span>Id</th>
                    <th class="px-3 py-3 border border-black">Title</th>
                    <th class="px-3 py-3 border border-black">Description</th>
                    <th class="px-3 py-3 border border-black">Image</th>
                    <th class="px-3 py-3 border border-black">Category</th>
                    <th class="px-3 py-3 border border-black w-0">Actions</th>
                </tr>
            </thead>
            <tbody class="border border-black">
                @if ($posts != null)
                    @foreach ($posts as $post)
                    <tr class="text-base">
                        <td class="px-3 py-3 border border-black">{{$post->id}}</td>
                        <td class="px-3 py-3 border border-black">{{$post->user->name}}<span class="select-none"> | </span>{{$post->user->id}}</td>
                        <td class="px-3 py-3 border border-black">{{$post->title}}</td>
                        <td class="px-3 py-3 border border-black">
                            <p class="line-clamp-1">
                                {{$post->description}}
                            </p>
                        </td>
                        <td class="px-3 py-3 border border-black">
                            @if ($post->thumbnail == '')
                                <div class="select-none">-</div>
                            @else
                                <img src="{{ asset('storage/thumbnails/' .  $post->thumbnail) }}" width= "100" height="100" alt="">
                            @endif
                        </td>
                        <td class="px-3 py-3 border border-black">
                            <a href="{{ route('admin.category.show', $post->category->id)}}" class="font-semibold text-purple-700 hover:text-purple-950 hover:drop-shadow-2xl hover:underline">{{$post->category->name}}</a>
                        </td>
                        <td class="px-3 py-3 border border-black">
                            <div class=" gap-2 flex w-fit">
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
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div class="relative overflow-x-auto">
        
    </div>
    <script type="text/javascript">
        document.querySelector("#notif").addEventListener('mouseover', () => {
            document.querySelector('#notif').classList.add('hidden')
        });
    </script>
</div>
@endsection
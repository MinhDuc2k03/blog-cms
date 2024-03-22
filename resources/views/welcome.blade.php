@extends('layout')

@section('title', 'Home Page')
@section('content')
    <div>
        @auth
            <a href="{{ route('logout') }}">LOGOUT</a>
            <h1 class="content-center w-full">Hello {{auth()->user()->name}}</h1>
        @elseguest
            <a href="{{ route('login') }}">LOGIN</a>
            <a href="{{ route('register') }}">SIGN UP</a>
        @endauth
    </div>

    @if (Auth::check())
        <div>
            <a href="{{route('create')}}">CREATE POST</a>
            <a href=""></a>
        </div>
    @endif

    <div class="w-4/5 m-auto mt-10 bg-slate-100 border-2 border-slate-400 table-fixed">
        <table class="w-full divide-y dark:divide-gray-700 text-sm table-fixed">
            <thead class="divide-y dark:divide-gray-700">
                <tr class="text-nowrap">
                    <th class="px-4 py-1.5 w-36">Author</th>
                    <th class="px-4 py-1.5 bg-slate-200 w-36">Title</th>
                    <th class="px-4 py-1.5">Description</th>
                    <th class="px-4 py-1.5 bg-slate-200 w-32">Image</th>
                    <th class="px-4 py-1.5">Post</th>
                    @if (Auth::check())
                        <th class="px-4 py-1.5 bg-slate-200 w-20">Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody class="divide-y dark:divide-gray-700">
                @foreach ($posts as $post)
                <tr>
                    <td class="px-4 py-1.5">{{$post->user->name}}</td>
                    <td class="px-4 py-1.5 bg-slate-200">{{$post->title}}</td>
                    <td class="px-4 py-1.5">
                        <p class="">
                            {{$post->description}}
                        </p>
                    </td>
                    <td class="px-4 py-1.5 bg-slate-200">
                        @if ($post->thumbnail == '')
                            <div class="select-none">-</div>
                        @else
                            <img src="{{ asset('thumbnails/' .  $post->thumbnail) }}" width= "100" height="100" alt="">
                        @endif
                    </td>
                    <td class="px-4 py-1.5">
                        <p class="line-clamp-2 text-ellipsis">
                            {{$post->post}}
                        </p>
                    </td>
                    @if (Auth::check())
                    <td class="px-4 py-1.5 gap-2 bg-slate-200">
                        @if ($post->user->id == auth()->user()->id)
                            <div>
                                <a href="" class="select-none text-xs font-semibold text-purple-600 hover:text-purple-950 hover:drop-shadow-2xl hover:underline">View</a>
                            </div>
                            <div>
                                <a href="{{ route('edit', $post->id) }}" class="select-none text-xs font-semibold text-purple-600 hover:text-purple-950 hover:drop-shadow-2xl hover:underline">Edit</a>
                            </div>
                            <form action="{{ route('delete', $post->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this post?')" class="select-none text-xs font-semibold text-purple-600 hover:text-purple-950 hover:drop-shadow-2xl hover:underline">Delete</button>
                            </form>
                        @else
                            <div>
                                <a href="" class="select-none text-xs font-semibold text-purple-600 hover:text-purple-950 hover:drop-shadow-2xl hover:underline">View</a>
                            </div>
                        @endif
                        </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
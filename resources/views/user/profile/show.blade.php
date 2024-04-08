@extends('layout')

@section('title', 'User Profile Page')
@section('content')
<div class="w-10/12 pt-32 m-auto">
    <div class="flex mb-16 justify-between">
        <div class="flex">
            <a href="{{ route('profile.show', $user->name) }}">
                @if ($user->profile_picture == null)
                    <img class="object-cover w-24 h-24 rounded-full" src="{{ asset('assets/' .  'DefaultProfilePicture.jpg') }}">
                @else
                    <img class="object-cover w-24 h-24 rounded-full" src="{{ asset('profiles/' .  $user->profile_picture) }}">
                @endif
            </a>
            
            <div class="flex flex-col ml-3 justify-center">
                <div class="text-2xl">{{$user->display_name}}</div>
                <div class="text-base opacity-50">{{'@'}}{{$user->name}}</div>
            </div>
        </div>
        @if (auth()->check())
            @if (auth()->user()->id == $user->id)
            <div>
                <a href="{{ route('profile.edit', $user->name) }}" class="text-sm mr-10 md:mr-40 bg-white px-3 py-1.5 text-gray-500 border-2 border-gray-500 rounded-md hover:bg-gray-500 hover:text-white">Edit profile</a>
            </div>
            @endif
        @endif
    </div>
    <div class="shadow-md h-12 w-full bg-white border-b-2 flex items-center">
        <p class="ml-5 text-lg font-semibold">
            <a href="" class="w-full h-full">Posts</a>
        </p>
        {{-- <p class="ml-5 text-lg font-semibold">
            <a href="" class="w-full h-full">a1</a>
        </p>
        <p class="ml-5 text-lg font-semibold">
            <a href="" class="w-full h-full">a2</a>
        </p>
        <p class="ml-5 text-lg font-semibold">
            <a href="" class="w-full h-full">a3</a>
        </p>
        <p class="ml-5 text-lg font-semibold">
            <a href="" class="w-full h-full">a4</a>
        </p> --}}
    </div>
    <div class="my-10"></div>
    @foreach ($posts as $key => $post)
    <div class="mb-5 mt-5 border-b-2 pb-5 flex justify-between">
        <div class="flex flex-col ">
            <a href="{{route('post.show', $post->id)}}" class="text-sm mb-1 line-clamp-2 no-underline hover:underline">{{$post->title}}</a>
            <div class="flex overflow-hidden mb-2 text-xs">
                <a href="" class="text-green-700">{{$post->category->name}}</a>
                <div class="select-none">&nbsp•&nbsp</div>
                <a href="">{{$post->user->display_name}}</a>
                <div class="select-none">&nbsp•&nbsp</div>
                <div class="opacity-50">{{$post->created_at->format('d/m/Y')}}</div>
            </div>
            <div class="flex gap-4 h-24">
                <div class="relative max-w-full">
                    <a href="{{route('post.show', $post->id)}}">
                        @if ($post->thumbnail != null)
                            <img src="{{ asset('thumbnails/' .  $post->thumbnail) }}" class="object-cover rounded-2xl w-36 h-24">
                        @else
                            <img src="{{ asset('assets/' . 'blank.png') }}" class="object-cover rounded-2xl w-36 h-24">
                        @endif
                    </a>
                    <button class="absolute bottom-4 left-4">
                        <img src="{{ asset('assets/' . 'heart_unselected.png') }}" class="h-6">
                    </button>
                </div>
                <div class="flex flex-1 flex-col justify-center">
                    <a href="{{route('post.show', $post->id)}}" class="text-lg hidden no-underline hover:underline mb-3">{{$post->title}}</a>
                    <div class="hidden overflow-hidden whitespace-nowrap mb-4">
                        <a href="" class="text-green-700">{{$post->category->name}}</a>
                        <div class="select-none">&nbsp•&nbsp</div>
                        <a href="">{{$post->user->display_name}}</a>
                        <div class="select-none">&nbsp•&nbsp</div>
                        <div class="opacity-50">{{$post->created_at->format('d/m/Y')}}</div>
                    </div>
                    <div class="leading-1 line-clamp-4 text-sm opacity-50">{{$post->description}}</div>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-2">
            <a href="{{route('post.edit', $post->id)}}" class="text-sm mr-10 md:mr-40 bg-white px-3 py-1.5 text-gray-500 border-2 border-gray-500 rounded-md hover:bg-gray-500 hover:text-white">Edit post</a>
            <form action="{{route('delete', $post->id)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('Are you sure you want to delete this post?')" class="text-sm mr-10 md:mr-40 bg-white px-3 py-1.5 text-red-600 border-2 border-red-600 rounded-md hover:bg-red-600 hover:text-white">Delete post</button>
            </form>
            {{-- <a href="{{route('delete')}}" class="text-sm mr-10 md:mr-40 bg-white px-3 py-1.5 text-red-600 border-2 border-red-600 rounded-md hover:bg-red-600 hover:text-white">Delete post</a> --}}
        </div>
    </div>
    @endforeach
</div>
@endsection
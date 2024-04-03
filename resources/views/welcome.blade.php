@extends('layout')

@section('title', 'Home Page')
@section('content')
    <body class="font-default font-semibold text-gray-800">
        <div class="w-11/12 pt-32 m-auto lg:max-w-7xl">
            <div class="relative">
                <img src="{{ asset('assets/' . 'background.png') }}" class="rounded-2xl relative">
                <div class="hidden ml-28 absolute -translate-y-1/2 top-1/2 w-3/12 lg:block">
                    <img src="{{ asset('assets/' . 'banner.png') }}" class="mb-1"/>
                </div>
            </div>

            <div class="m-auto w-auto lg:w-2/3">
                <div class="flex gap-6 mt-9 mb-9 pb-3 overflow-scroll overflow-x-auto overflow-y-auto scrollbar-h-1 scrollbar scrollbar-w-1 scrollbar-thumb-rounded-lg scrollbar-thumb-gray-500 scrollbar-track-gray-300 scroll-smooth">
                    <a href="" class="px-9 py-1.5 text-lg whitespace-nowrap leading-7 rounded-full transition duration-150 hover:bg-green-700 hover:text-gray-100">Tất cả</a>
                    <a href="" class="px-9 py-1.5 text-lg whitespace-nowrap leading-7 rounded-full bg-green-700 text-gray-100">Xã hội</a>
                    <a href="" class="px-9 py-1.5 text-lg whitespace-nowrap leading-7 rounded-full transition duration-150 hover:bg-green-700 hover:text-gray-100">Nhà đất</a>
                    <a href="" class="px-9 py-1.5 text-lg whitespace-nowrap leading-7 rounded-full transition duration-150 hover:bg-green-700 hover:text-gray-100">Đời sống</a>
                    <a href="" class="px-9 py-1.5 text-lg whitespace-nowrap leading-7 rounded-full transition duration-150 hover:bg-green-700 hover:text-gray-100">Video</a>
                </div>
                <div class="flex flex-col gap-8">
                    @foreach ($posts as $post)
                    <div>
                        <a href="{{route('post.show', $post->id)}}" class="text-sm mb-1 line-clamp-2 sm:hidden no-underline hover:underline">{{$post->title}}</a>
                        <div class="sm:hidden flex overflow-hidden mb-2 text-xs sm:mb-4 sm:text-sm">
                            <a href="" class="text-green-700">{{$post->category->name}}</a>
                            <div class="select-none">&nbsp•&nbsp</div>
                            <a href="">{{$post->user->display_name}}</a>
                            <div class="select-none">&nbsp•&nbsp</div>
                            <div class="opacity-50">{{$post->created_at->format('d/m/Y')}}</div>
                        </div>
                        <div class="flex gap-4 h-24 sm:h-56">
                            <div class="relative max-w-full">
                                <a href="{{route('post.show', $post->id)}}">
                                    @if ($post->thumbnail != null)
                                        <img src="{{ asset('thumbnails/' .  $post->thumbnail) }}" class="object-cover rounded-2xl w-36 h-24 sm:w-80 sm:h-52">
                                    @else
                                        <img src="{{ asset('assets/' . 'blank.png') }}" class="object-cover rounded-2xl w-36 h-24 sm:w-80 sm:h-52">
                                    @endif
                                </a>
                                <button class="absolute bottom-4 left-4 sm:top-5 sm:right-5 sm:bottom-auto sm:left-auto">
                                    <img src="{{ asset('assets/' . 'heart_unselected.png') }}" class="h-6">
                                </button>
                            </div>
                            <div class="flex flex-1 flex-col justify-center">
                                <a href="{{route('post.show', $post->id)}}" class="text-lg hidden sm:line-clamp-2 no-underline hover:underline mb-3">{{$post->title}}</a>
                                <div class="hidden overflow-hidden whitespace-nowrap mb-4 sm:mb-4 sm:flex ">
                                    <a href="" class="text-green-700">{{$post->category->name}}</a>
                                    <div class="select-none">&nbsp•&nbsp</div>
                                    <a href="">{{$post->user->display_name}}</a>
                                    <div class="select-none">&nbsp•&nbsp</div>
                                    <div class="opacity-50">{{$post->created_at->format('d/m/Y')}}</div>
                                </div>
                                <div class="leading-1 line-clamp-4 text-sm sm:line-clamp-3 sm:text-base sm:leading-7 opacity-50">{{$post->description}}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    <div class="my-20"></div>
                    {{-- <div class="mx-auto my-20 leading-10 border-2 border-black text-center w-64 rounded-full py-2 bg-white transition duration-150 hover:bg-gray-300">
                        <a href="">Xem thêm</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </body>
@endsection
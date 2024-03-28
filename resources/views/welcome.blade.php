@extends('layout')

@section('title', 'Home Page')
@section('content')
    <body class="font-default font-semibold text-gray-800">
        <div class="w-11/12 pt-32 m-auto lg:max-w-7xl">
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
                        <a href="" class="text-sm mb-1 line-clamp-2 sm:hidden no-underline hover:underline">Making a Housing Wage: Where Teachers, First Responders and Restaurant Workers Can Live Where They Work</a>
                        <div class="sm:hidden flex overflow-hidden mb-2 text-xs sm:mb-4 sm:text-sm">
                            <a href="" class="text-green-700">Xã hội</a>
                            <div class="select-none">&nbsp•&nbsp</div>
                            <a href="">Quang Anh Trần</a>
                            <div class="select-none">&nbsp•&nbsp</div>
                            <div class="opacity-50">24/02/2020</div>
                        </div>
                        <div class="flex gap-4 h-24 sm:h-56">
                            <div class="relative max-w-full">
                                <a href="">
                                    <img src="{{ asset('thumbnails/' .  $post->thumbnail) }}" class="h-full rounded-lg" width="342" height="224">
                                </a>
                                <button class="absolute bottom-4 left-4 sm:top-5 sm:right-5 sm:bottom-auto sm:left-auto">
                                    <img src="{{ asset('assets/' . 'heart_unselected.png') }}" class="h-6">
                                </button>
                            </div>
                            <div class="flex flex-1 flex-col justify-center">
                                <a href="" class="text-lg hidden sm:line-clamp-2 no-underline hover:underline mb-3">{{$post->title}}</a>
                                <div class="hidden overflow-hidden whitespace-nowrap mb-4 sm:mb-4 sm:flex ">
                                    <a href="" class="text-green-700">{{$post->category->name}}</a>
                                    <div class="select-none">&nbsp•&nbsp</div>
                                    <a href="">{{$post->user->name}}</a>
                                    <div class="select-none">&nbsp•&nbsp</div>
                                    <div class="opacity-50">{{$post->created_at->format('d/m/Y')}}</div>
                                </div>
                                <div class="leading-1 line-clamp-4 text-sm sm:line-clamp-3 sm:text-base sm:leading-7 opacity-50">{{$post->description}}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
    
                    <div class="mx-auto my-20 leading-10 border-2 border-black text-center w-64 rounded-full py-2 bg-white transition duration-150 hover:bg-gray-300">
                        <a href="">Xem thêm</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="modal" class="fixed inset-x-0 inset-y-0 bg-white z-50 hidden flex-col justify-between items-center">
            <div class="w-full">
                <div class="h-20 bg-white flex justify-between overflow-hidden inset-x-0 top-0 z-20 mb-20">
                    <div class="flex mt-9 sm:mt-5">
                        <div class="ml-6">
                            <button id="button-menu-close">
                                <img src="./images/icons/close.png" class="h-6" />
                            </button>
                        </div>
                        <div class="ml-3 mt-0.5">
                            <a href="{{route('home')}}">
                                <img src="./images/icons/logo.png" class="h-4" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="ml-5 mr-5 text-2xl grid grid-cols-5 items-center gap-x-3 gap-y-5 font-bold">
                    <a href="" class="opacity-50 col-span-3 sm:col-span-2">Mua nhà</a>
                    <div class="h-1 w-full col-span-2 sm:col-span-3 bg-transparent mr-7"></div>
                    <a href=""  class="opacity-50 col-span-3 sm:col-span-2">Thuê nhà</a>
                    <div class="h-1 w-full col-span-2 sm:col-span-3 bg-transparent mr-7"></div>
                    <a href=""  class="opacity-50 col-span-3 sm:col-span-2">Khám phá</a>
                    <div class="h-1 w-full col-span-2 sm:col-span-3 bg-transparent mr-7"></div>
                    <a href=""  class="text-red-500 col-span-3 sm:col-span-2">Blog</a>
                    <div class="h-1 w-full col-span-2 sm:col-span-3 bg-red-500 mr-3"></div>
                </div>
            </div>
            <div class="mb-4 text-sm w-full sm:w-3/5">
                <div class="mx-4 rounded-full bg-red-500 text-white py-2 text-center mb-3 sm:mb-5">Đăng bài</div>
                <div class="mx-4 flex gap-4">
                    <div class="rounded-full bg-transparent text-gray-800 py-2 text-center w-full">Đăng nhập</div>
                    <div class="rounded-full bg-gray-800 text-white py-2 text-center w-full">Đăng ký</div>
                </div>
            </div>
        </div>
        <script src="./js/script.js"></script>
    </body>
@endsection
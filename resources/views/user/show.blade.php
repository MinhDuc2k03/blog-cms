@extends('layout')

@section('title', 'Post Page')
@section('content')
<div class="w-11/12 pt-32 m-auto lg:max-w-4xl">
    <div class="flex justify-between mb-10">
        <a href="{{route('home')}}" class="flex justify-center items-center text-sm">
            <div class="mr-2 select-none">&lt;</div>
            <div class="text-red-600">Back</div>
        </a>
        <div class="flex text-sm">
            <div class="mr-3 flex justify-center items-center">
                <div>Category:</div>
            </div>
            <a href="./xahoi.html" class="rounded-full bg-green-700 transition duration-150 hover:bg-green-900 text-gray-100 px-9 py-1">{{$post->category->name}}</a>
        </div>
    </div>

    <div class="text-xl leading-7 sm:text-3xl sm:leading-10 font-bold mb-3">{{$post->title}}</div>

    <div class="block sm:flex justify-between mb-10 gap-2">
        <div class="flex justify-normal sm:justify-center items-center mb-3 sm:mb-0">
            <div class="flex text-sm overflow-hidden whitespace-nowrap">
                <a href="./xahoi.html" class="text-green-700">{{$post->category->name}}</a>
                <div class="select-none">&nbsp•&nbsp</div>
                <a href="">{{$post->user->display_name}}</a>
                <div class="select-none">&nbsp•&nbsp</div>
                <div class="opacity-50">{{$post->created_at->format('d/m/Y')}}</div>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-2">
            <button class="flex items-center justify-center bg-gray-400 transition duration-150 hover:bg-gray-600 rounded-full px-10 py-2 gap-2">
                <img src="{{ asset('assets/' . 'mail.png') }}" class="w-6 h-6">
                <div class="text-white text-nowrap text-sm hidden lg:block">Send mail</div>
            </button>
            <button class="flex items-center justify-center bg-sky-800 transition duration-150 hover:bg-sky-950 rounded-full px-10 py-2 gap-2">
                <img src="{{ asset('assets/' . 'facebook.png') }}" class="w-6 h-6">
                <div class="text-white text-nowrap text-sm hidden lg:block">Share</div>
            </button>
            <button class="flex items-center justify-center bg-white transition duration-150 hover:bg-gray-300 rounded-full px-10 py-2 gap-2 border-2 border-black">
                <img src="{{ asset('assets/' . 'heart.png') }}" class="w-6 h-6 fill-gray-400">
                <div class=" overflow-hidden text-sm hidden lg:block">Save</div>
            </button>
        </div>
    </div>
    
    <img src="{{ asset('thumbnails/' .  $post->thumbnail) }}" class="w-full mb-7">

    <div class="text-base font-normal leading-7 mb-12 break-words">{{$post->post}}</div>

    {{-- <div class="flex flex-col sm:flex-row gap-5 mb-5">
        <img src="./images/images/news1-1.png" class="w-full sm:w-3/5 rounded-2xl">
        <div class="flex flex-row sm:flex-col gap-5">
            <div>
                <img src="./images/images/news1-2.png" class="max-w-full w-full h-full object-cover rounded-2xl">
            </div>
            <div>
                <img src="./images/images/news1-3.png" class="max-w-full w-full h-full object-cover rounded-2xl">
            </div>
        </div>
    </div>

    <div class="text-2xl mb-3">Lorem ipsum dolor sit amet, </div>
    
    <div class="text-base font-normal leading-7 mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sem id varius rutrum aliquam. Diam ullamcorper ut mattis fringilla nunc, sed eu nisi. Amet, duis auctor tempor sit mauris rhoncus. Pretium at massa sed morbi sit tincidunt arcu. Pharetra, turpis id elementum cursus amet, eu scelerisque ipsum. Suspendisse nulla congue mauris mattis diam sed venenatis non bibendum. Vestibulum, lobortis aenean lorem aenean sagittis. Et nibh ullamcorper justo cursus eget. Tortor faucibus volutpat, vel nullam sed massa ullamcorper in ultrices. Augue viverra tincidunt amet, </div> --}}

    {{-- <div class="mb-10">
        <ul class="list-disc list-inside">
            <li class="mb-3">
                <span class="mr-1">Tiêu chí 1:</span>
                <span class="text-base font-normal">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Blandit molestie etiam nunc egestas</span>
            </li>
            <li class="mb-3">
                <span class="mr-1">Tiêu chí 2: </span>
                <span class="text-base font-normal">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Blandit molestie etiam nunc egestas</span>
            </li>
            <li class="mb-3">
                <span class="mr-1">Tiêu chí 3: </span>
                <span class="text-base font-normal">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Blandit molestie etiam nunc egestas</span>
            </li>
            <li class="mb-3">
                <span class="mr-1">Tiêu chí 4: </span>
                <span class="text-base font-normal">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Blandit molestie etiam</span>
            </li>
            <li class="mb-3">
                <span class="mr-1">Tiêu chí 5: </span>
                <span class="text-base font-normal">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Blandit molestie etiam nunc egestas</span>
            </li>
        </ul>
    </div> --}}

    <div class="flex gap-3 mb-10">
        @if ($post->tag)
            <div>
                <button class="px-4 sm:px-9 py-1.5 bg-gray-300 transition duration-150 hover:bg-gray-400 rounded-full text-xs sm:text-base font-normal">#Keyword 1</button>
            </div>
            <div>
                <button class="px-4 sm:px-9 py-1.5 bg-gray-300 transition duration-150 hover:bg-gray-400 rounded-full text-xs sm:text-base font-normal">#Keyword 2</button>
            </div>
        @endif
    </div>

    <div class="flex justify-between mb-10">
        <div class="flex text-sm">
            <div class="mr-3 flex justify-center items-center">
                <div class="text-sm sm:text-lg">Blogs with same category</div>
            </div>
            <a href="./xahoi.html" class="rounded-full bg-green-700 transition duration-150 hover:bg-green-900 text-gray-100 px-9 py-1">{{$post->category->name}}</a>
        </div>
        <div class="flex justify-between items-center">
            <a href="./xahoi.html">
                <img src="./images/icons/arrowRight.png" class="sm:hidden h-4">
                <div class="text-base font-normal transition duration-150 hover:font-bold hidden sm:block">See more</div>
            </a>
        </div>
    </div>

    <div class="flex flex-col gap-8 mb-12">
        <div>
            <a href="./news.html" class="text-sm mb-1 line-clamp-2 sm:hidden">Making a Housing Wage: Where Teachers, First Responders and Restaurant Workers Can Live Where They Work</a>
            <div class="sm:hidden flex overflow-hidden mb-2 text-xs sm:mb-4 sm:text-sm">
                <a href="./xahoi.html" class="text-green-700">Xã hội</a>
                <div class="select-none">&nbsp•&nbsp</div>
                <a href="">Quang Anh Trần</a>
                <div class="select-none">&nbsp•&nbsp</div>
                <div class="opacity-50">24/02/2020</div>
            </div>
            <div class="flex gap-4 h-24 sm:h-56">
                <div class="relative max-w-full">
                    <a href="./news.html">
                        <img src="./images/images/list7.png" class="h-full">
                    </a>
                    <button class="absolute bottom-4 left-4 sm:top-5 sm:right-5 sm:bottom-auto sm:left-auto">
                        <img src="./images/icons/heart_unselected.png" class="h-6">
                    </button>
                </div>
                <div class="flex flex-1 flex-col justify-center">
                    <a href="./news.html" class="text-lg hidden sm:line-clamp-2 mb-3">Making a Housing Wage: Where Teachers, First Responders and Restaurant Workers Can Live Where They Work</a>
                    <div class="hidden overflow-hidden whitespace-nowrap mb-4 sm:mb-4 sm:flex ">
                        <a href="./xahoi.html" class="text-green-700">Xã hội</a>
                        <div class="select-none">&nbsp•&nbsp</div>
                        <a href="">Quang Anh Trần</a>
                        <div class="select-none">&nbsp•&nbsp</div>
                        <div class="opacity-50">24/02/2020</div>
                    </div>
                    <div class="leading-1 line-clamp-4 text-sm sm:line-clamp-3 sm:text-base sm:leading-7 opacity-50">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit diam at feugiat purus, interdum porta sed. Ac ut hendrerit enim et scelerisque nullam lorem. Libero mi velit id vitae...</div>
                </div>
            </div>
        </div>

        <div>
            <a href="./news.html" class="text-sm mb-1 line-clamp-2 sm:hidden">Making a Housing Wage: Where Teachers, First Responders and Restaurant Workers Can Live Where They Work</a>
            <div class="sm:hidden flex overflow-hidden mb-2 text-xs sm:mb-4 sm:text-sm">
                <a href="./xahoi.html" class="text-green-700">Xã hội</a>
                <div class="select-none">&nbsp•&nbsp</div>
                <a href="">Quang Anh Trần</a>
                <div class="select-none">&nbsp•&nbsp</div>
                <div class="opacity-50">24/02/2020</div>
            </div>
            <div class="flex gap-4 h-24 sm:h-56">
                <div class="relative max-w-full">
                    <a href="./news.html">
                        <img src="./images/images/list8.png" class="h-full">
                    </a>
                    <button class="absolute bottom-4 left-4 sm:top-5 sm:right-5 sm:bottom-auto sm:left-auto">
                        <img src="./images/icons/heart_unselected.png" class="h-6">
                    </button>
                </div>
                <div class="flex flex-1 flex-col justify-center">
                    <a href="./news.html" class="text-lg hidden sm:line-clamp-2 mb-3">Making a Housing Wage: Where Teachers, First Responders and Restaurant Workers Can Live Where They Work</a>
                    <div class="hidden overflow-hidden whitespace-nowrap mb-4 sm:mb-4 sm:flex ">
                        <a href="./xahoi.html" class="text-green-700">Xã hội</a>
                        <div class="select-none">&nbsp•&nbsp</div>
                        <a href="">Quang Anh Trần</a>
                        <div class="select-none">&nbsp•&nbsp</div>
                        <div class="opacity-50">24/02/2020</div>
                    </div>
                    <div class="leading-1 line-clamp-4 text-sm sm:line-clamp-3 sm:text-base sm:leading-7 opacity-50">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit diam at feugiat purus, interdum porta sed. Ac ut hendrerit enim et scelerisque nullam lorem. Libero mi velit id vitae...</div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-between mb-10">
        <div class="text-sm sm:text-lg">Hot blogs</div>
        <div class="flex justify-between items-center">
            <a href="./news.html">
                <img src="./images/icons/arrowRight.png" class="sm:hidden h-4">
                <div class="text-base font-normal transition duration-150 hover:font-bold hidden sm:block">See more</div>
            </a>
        </div>
    </div>

    <div class="flex flex-col gap-8 mb-12">
        <div>
            <a href="./news.html" class="text-sm mb-1 line-clamp-2 sm:hidden">Making a Housing Wage: Where Teachers, First Responders and Restaurant Workers Can Live Where They Work</a>
            <div class="sm:hidden flex overflow-hidden mb-2 text-xs sm:mb-4 sm:text-sm">
                <a href="./xahoi.html" class="text-green-700">Xã hội</a>
                <div class="select-none">&nbsp•&nbsp</div>
                <a href="">Quang Anh Trần</a>
                <div class="select-none">&nbsp•&nbsp</div>
                <div class="opacity-50">24/02/2020</div>
            </div>
            <div class="flex gap-4 h-24 sm:h-56">
                <div class="relative max-w-full">
                    <a href="./news.html">
                        <img src="./images/images/list5.png" class="h-full">
                    </a>
                    <button class="absolute bottom-4 left-4 sm:top-5 sm:right-5 sm:bottom-auto sm:left-auto">
                        <img src="./images/icons/heart_unselected.png" class="h-6">
                    </button>
                </div>
                <div class="flex flex-1 flex-col justify-center">
                    <a href="./news.html" class="text-lg hidden sm:line-clamp-2 mb-3">Making a Housing Wage: Where Teachers, First Responders and Restaurant Workers Can Live Where They Work</a>
                    <div class="hidden overflow-hidden whitespace-nowrap mb-4 sm:mb-4 sm:flex ">
                        <a href="./xahoi.html" class="text-green-700">Xã hội</a>
                        <div class="select-none">&nbsp•&nbsp</div>
                        <a href="">{{$post->user->display_name}}</a>
                        <div class="select-none">&nbsp•&nbsp</div>
                        <div class="opacity-50">24/02/2020</div>
                    </div>
                    <div class="leading-1 line-clamp-4 text-sm sm:line-clamp-3 sm:text-base sm:leading-7 opacity-50">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit diam at feugiat purus, interdum porta sed. Ac ut hendrerit enim et scelerisque nullam lorem. Libero mi velit id vitae...</div>
                </div>
            </div>
        </div>

        <div>
            <a href="./news.html" class="text-sm mb-1 line-clamp-2 sm:hidden">Making a Housing Wage: Where Teachers, First Responders and Restaurant Workers Can Live Where They Work</a>
            <div class="sm:hidden flex overflow-hidden mb-2 text-xs sm:mb-4 sm:text-sm">
                <a href="./xahoi.html" class="text-green-700">Xã hội</a>
                <div class="select-none">&nbsp•&nbsp</div>
                <a href="">Quang Anh Trần</a>
                <div class="select-none">&nbsp•&nbsp</div>
                <div class="opacity-50">24/02/2020</div>
            </div>
            <div class="flex gap-4 h-24 sm:h-56">
                <div class="relative max-w-full">
                    <a href="./news.html">
                        <img src="./images/images/list6.png" class="h-full">
                    </a>
                    <button class="absolute bottom-4 left-4 sm:top-5 sm:right-5 sm:bottom-auto sm:left-auto">
                        <img src="./images/icons/heart_unselected.png" class="h-6">
                    </button>
                </div>
                <div class="flex flex-1 flex-col justify-center">
                    <a href="./news.html" class="text-lg hidden sm:line-clamp-2 mb-3">Making a Housing Wage: Where Teachers, First Responders and Restaurant Workers Can Live Where They Work</a>
                    <div class="hidden overflow-hidden whitespace-nowrap mb-4 sm:mb-4 sm:flex ">
                        <a href="./xahoi.html" class="text-green-700">Xã hội</a>
                        <div class="select-none">&nbsp•&nbsp</div>
                        <a href="">{{$post->user->display_name}}</a>
                        <div class="select-none">&nbsp•&nbsp</div>
                        <div class="opacity-50">24/02/2020</div>
                    </div>
                    <div class="leading-1 line-clamp-4 text-sm sm:line-clamp-3 sm:text-base sm:leading-7 opacity-50">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit diam at feugiat purus, interdum porta sed. Ac ut hendrerit enim et scelerisque nullam lorem. Libero mi velit id vitae...</div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-40"></div>
</div>
@endsection
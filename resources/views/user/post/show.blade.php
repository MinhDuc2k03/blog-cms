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
            <a href="{{route('home', ['category_id' => $post->category->id])}}" class="rounded-full bg-green-700 transition duration-150 hover:bg-green-900 text-gray-100 px-9 py-2">{{$post->category->name}}</a>
        </div>
    </div>
    <div class="flex justify-between mb-3">
        <div class="text-xl leading-7 sm:text-3xl sm:leading-10 font-bold">{{$post->title}}</div>
        <div class="flex gap-1">
            <img src="{{ asset('assets/' . 'view.png') }}" class="h-7">
            <div class="text-xl">{{$post->views}}</div>
        </div>
    </div>

    <div class="block sm:flex justify-between mb-10 gap-2">
        <div class="flex justify-normal sm:justify-center items-center mb-3 sm:mb-0">
            <div class="flex text-sm overflow-hidden whitespace-nowrap">
                <a href="{{route('home', ['category_id' => $post->category->id])}}" class="text-green-700">{{$post->category->name}}</a>
                <div class="select-none">&nbsp•&nbsp</div>
                <a href="{{route('home', ['author_id' => $post->author_id])}}">{{$post->user->display_name}}</a>
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
    
    @if ($post->thumbnail != null)
        <img src="{{ asset('storage/thumbnails/' .  $post->thumbnail) }}" class="object-cover w-full mb-7 rounded-2xl">
    @endif

    <div class="text-base font-normal leading-7 mb-12 break-words">{!! $post->post !!}</div>

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

    <div class="flex flex-wrap flex-row gap-3 mb-10">
        @if ($post->tags)
            @foreach ($post->tags as $tag)
                <div>
                    <button class="px-4 sm:px-9 py-1.5 bg-gray-300 transition duration-150 hover:bg-gray-400 rounded-full text-xs sm:text-base font-normal">#{{$tag->name}}</button>
                </div>
            @endforeach
        @endif
    </div>
    @if ($categoryPosts->count() > 1)
    <div class="flex justify-between mb-10">
        <div class="flex text-sm">
            <div class="mr-3 flex justify-center items-center">
                <div class="text-sm sm:text-lg">Blogs with same category</div>
            </div>
            <a href="{{route('home', ['category_id' => $post->category->id])}}" class="rounded-full bg-green-700 transition duration-150 hover:bg-green-900 text-gray-100 px-9 py-2">{{$post->category->name}}</a>
        </div>
        <div class="flex justify-between items-center">
            <a href="{{route('home', ['category_id' => $post->category->id])}}">
                <img src="{{ asset('assets/' . 'arrowRight.png') }}" class="sm:hidden h-4">
                <div class="text-base font-normal transition duration-150 hover:font-bold hidden sm:block">See more</div>
            </a>
        </div>
    </div>
    <div class="flex flex-col gap-8 mb-12">
        @foreach ($categoryPosts as $key=>$categoryPost)
        @if ($key > 2)
            @break
        @endif
            @if ($categoryPost->id != $post->id)
                <div>
                    <a href="{{route('post.show', $categoryPost->id)}}" class="text-sm mb-1 line-clamp-2 sm:hidden">{{$categoryPost->title}}</a>
                    <div class="sm:hidden flex overflow-hidden mb-2 text-xs sm:mb-4 sm:text-sm">
                        <a href="{{route('home', ['category_id' => $post->category->id])}}" class="text-green-700">{{$categoryPost->category->name}}</a>
                        <div class="select-none">&nbsp•&nbsp</div>
                        <a href="{{route('home', ['author_id' => $post->author_id])}}">{{$categoryPost->user->display_name}}</a>
                        <div class="select-none">&nbsp•&nbsp</div>
                        <div class="opacity-50">{{$categoryPost->created_at->format('d/m/Y')}}</div>
                    </div>
                    <div class="flex gap-4 h-24 sm:h-56">
                        <div class="relative max-w-full">
                            <a href="{{route('post.show', $categoryPost->id)}}">
                                @if ($categoryPost->thumbnail != null)
                                    <img src="{{ asset('storage/thumbnails/' .  $categoryPost->thumbnail) }}" class="object-cover rounded-2xl w-36 h-24 sm:w-80 sm:h-52">
                                @else
                                    <img src="{{ asset('assets/' . 'blank.png') }}" class="object-cover rounded-2xl w-36 h-24 sm:w-80 sm:h-52">
                                @endif
                            </a>
                            <button class="absolute bottom-4 left-4 sm:top-5 sm:right-5 sm:bottom-auto sm:left-auto">
                                <img src="{{ asset('assets/' . 'heart_unselected.png') }}" class="h-6">
                            </button>
                        </div>
                        <div class="flex flex-1 flex-col justify-center">
                            <a href="{{route('post.show', $categoryPost->id)}}" class="text-lg hidden sm:line-clamp-2 mb-3 no-underline hover:underline">{{$categoryPost->title}}</a>
                            <div class="hidden overflow-hidden whitespace-nowrap mb-4 sm:mb-4 sm:flex ">
                                <a href="{{route('home', ['category_id' => $categoryPost->category->id])}}" class="text-green-700">{{$categoryPost->category->name}}</a>
                                <div class="select-none">&nbsp•&nbsp</div>
                                <a href="{{route('home', ['author_id' => $categoryPost->author_id])}}">{{$categoryPost->user->display_name}}</a>
                                <div class="select-none">&nbsp•&nbsp</div>
                                <div class="opacity-50">{{$categoryPost->created_at->format('d/m/Y')}}</div>
                            </div>
                            @if (strlen($categoryPost->description) != 0)
                                <div class="leading-1 line-clamp-4 mb-4 text-sm sm:line-clamp-3 sm:text-base sm:leading-7 opacity-50">{{$categoryPost->description}}</div>
                            @endif
                            <div class="flex gap-1">
                                <img src="{{ asset('assets/' . 'view.png') }}" class="h-5 opacity-50">
                                <div class="text-sm opacity-50">{{$categoryPost->views}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    @endif
    

    <div class="flex justify-between mb-10">
        <div class="text-sm sm:text-lg">Hot blogs</div>
        <div class="flex justify-between items-center">
            <a href="{{route('home')}}">
                <img src="{{ asset('assets/' . 'arrowRight.png') }}" class="sm:hidden h-4">
                <div class="text-base font-normal transition duration-150 hover:font-bold hidden sm:block">See more</div>
            </a>
        </div>
    </div>

    <div class="flex flex-col gap-8 mb-12">
        @foreach ($hotPosts as $key=>$hotPost)

            @if ($hotPost->id != $post->id)
                <div>
                    <a href="{{route('post.show', $hotPost->id)}}" class="text-sm mb-1 line-clamp-2 sm:hidden">{{$hotPost->title}}</a>
                    <div class="sm:hidden flex overflow-hidden mb-2 text-xs sm:mb-4 sm:text-sm">
                        <a href="{{route('home', ['category_id' => $hotPost->category->id])}}" class="text-green-700">{{$hotPost->category->name}}</a>
                        <div class="select-none">&nbsp•&nbsp</div>
                        <a href="{{route('home', ['author_id' => $hotPost->author_id])}}">{{$hotPost->user->display_name}}</a>
                        <div class="select-none">&nbsp•&nbsp</div>
                        <div class="opacity-50">{{$hotPost->created_at->format('d/m/Y')}}</div>
                    </div>
                    <div class="flex gap-4 h-24 sm:h-56">
                        <div class="relative max-w-full">
                            <a href="{{route('post.show', $hotPost->id)}}">
                                @if ($hotPost->thumbnail != null)
                                    <img src="{{ asset('storage/thumbnails/' .  $hotPost->thumbnail) }}" class="object-cover rounded-2xl w-36 h-24 sm:w-80 sm:h-52">
                                @else
                                    <img src="{{ asset('assets/' . 'blank.png') }}" class="object-cover rounded-2xl w-36 h-24 sm:w-80 sm:h-52">
                                @endif
                            </a>
                            <button class="absolute bottom-4 left-4 sm:top-5 sm:right-5 sm:bottom-auto sm:left-auto">
                                <img src="{{ asset('assets/' . 'heart_unselected.png') }}" class="h-6">
                            </button>
                        </div>
                        <div class="flex flex-1 flex-col justify-center">
                            <a href="{{route('post.show', $hotPost->id)}}" class="text-lg hidden sm:line-clamp-2 mb-3 no-underline hover:underline">{{$hotPost->title}}</a>
                            <div class="hidden overflow-hidden whitespace-nowrap mb-4 sm:mb-4 sm:flex ">
                                <a href="{{route('home', ['category_id' => $hotPost->category->id])}}" class="text-green-700">{{$hotPost->category->name}}</a>
                                <div class="select-none">&nbsp•&nbsp</div>
                                <a href="{{ route('profile.show', $hotPost->user->name) }}">{{$hotPost->user->display_name}}</a>
                                <div class="select-none">&nbsp•&nbsp</div>
                                <div class="opacity-50">{{$hotPost->created_at->format('d/m/Y')}}</div>
                            </div>
                            @if (strlen($hotPost->description) != 0)
                                <div class="leading-1 line-clamp-4 mb-4 text-sm sm:line-clamp-3 sm:text-base sm:leading-7 opacity-50">{{$hotPost->description}}</div>
                            @endif
                            <div class="flex gap-1">
                                <img src="{{ asset('assets/' . 'view.png') }}" class="h-5 opacity-50">
                                <div class="text-sm opacity-50">{{$hotPost->views}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    <div class="my-40"></div>
</div>
@endsection